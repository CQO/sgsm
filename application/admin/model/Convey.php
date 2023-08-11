<?php

namespace app\admin\model;

use think\Model;
use think\Db;

class Convey extends Model
{

    protected $table = 'xy_convey';

    /**
     * 创建订单
     *
     * @param int $uid
     * @return array
     */

    public function today_order_num($uid)
    {
        $where = [
            ['uid', '=', $uid],
            ['addtime', 'between', strtotime(date('Y-m-d')) . ',' . time()],
        ];
        $day_d_count = Db::name('xy_convey')->where($where)->where('status', 'in', [0, 1, 3, 5])->count('id');
        return $day_d_count;
    }
    public function create_order($uid, $cid = 1)
    {
        $today_order_num = $this->today_order_num($uid);
        $day_order_idx = $today_order_num + 1;    //当前已经抢单序
        $uinfo = Db::name('xy_users')->field('deal_status,balance,level,deal_min_num,deal_max_num')->find($uid);  //获取用户信息
        $level = $uinfo['level'];    //用户等级
        !$uinfo['level'] ? $level = 0 : ''; //如果不存在等级 则默认等级为0
        $ulevel = Db::name('xy_level')->where('level', $level)->find();   //判断余额是否达到等级最小余额
        if ($uinfo['balance'] < $ulevel['num_min']) {
            return ['code' => 1, 'info' => '会员等级余额不足!'];
        }

        if ($today_order_num >= $ulevel['order_num']) {
            return ['code' => 1, 'info' => '当前等级抢单次数已达最大值'];
        }

        $add_id = Db::name('xy_member_address')->where('uid', $uid)->value('id'); //获取收款地址信息s
        if (!$add_id) return ['code' => 1, 'info' => '还没有设置收货地址'];
        if ($uinfo['deal_status'] != 2) return ['code' => 1, 'info' => '抢单已终止'];
        if ($uinfo['balance'] < 0) {
            return ['code' => 1, 'info' => '您的余额不足'];
        }
        $this->add_pre_order($uid);    //

        // 连单处理开始   连单先扣除余额并生成订单,执行确认操作再判断余额是否大于0
        $taskOrder = Db::name('xy_convey')->where('uid', $uid)->where('status', 6)->find();
        if ($taskOrder) { //判断连单
            /*$count=Db::name('xy_convey')->where('uid',$uid)->where('type', $taskOrder['type'])->where('status',6)->count();
            // 最后连单不能为负数
            if ($count==1) {
                if ($uinfo['balance']<$taskOrder['num']) {
                    return ['code'=>1,'info'=>'您的余额不足'];
                }
            }*/
            // 扣除并冻结余额；增加抢单次数  获取连单总价格
            $freeze_balance = $taskOrder['num'] + $taskOrder['commission'];
            Db::name('xy_users')->where('id', $uid)
                ->dec('deal_count')
                ->dec('balance', $taskOrder['num'])
                ->inc('freeze_balance', $freeze_balance)
                ->update();

            //扣除第一单的金额

            Db::name('xy_convey')->where('id', $taskOrder['id'])->update(['status' => 0, 'day_order_idx' => $day_order_idx]);
            return ['code' => 0, 'info' => '抢单成功!', 'oid' => $taskOrder['id']];
        }
        // 连单处理结束

        // 普通单必须余额充足

        // 获取匹配范范围数据
        if (empty($uinfo['deal_min_num']) && empty($uinfo['deal_max_num'])) {
            $base_min =  config('deal_min_num');
            $base_max =  config('deal_max_num');
        } else {
            $base_min =  empty($uinfo['deal_min_num']) ? 0 : $uinfo['deal_min_num'];
            $base_max =  empty($uinfo['deal_max_num']) ? 0 : $uinfo['deal_max_num'];
        }

        $min = $uinfo['balance'] * $base_min / 100;
        $max = $uinfo['balance'] * $base_max / 100;
        $goods = $this->rand_order($min, $max, $cid);
        if ($goods['num'] > $uinfo['balance']) return ['code' => 1, 'info' => '可用余额不足!'];



        $id = getSn('UB');
        Db::startTrans();
        $commission = $goods['num'] * $ulevel['bili'];
        $freeze_balance = $goods['num'] + $commission;
        $res = Db::name('xy_users')->where('id', $uid)   //扣除押金
            ->dec('balance', $goods['num'])
            ->inc('freeze_balance', $freeze_balance)
            ->update(['deal_status' => 3, 'deal_time' => strtotime(date('Y-m-d')), 'deal_count' => Db::raw('deal_count+1')]); //将账户状态改为交易中
        //通过商品id查找 佣金比例
        $cate = Db::name('xy_goods_cate')->find($goods['cid']);;

        //var_dump($cate,123,$goods);die;

        $res1 = Db::name($this->table)
            ->insert([
                'id'            => $id,
                'uid'           => $uid,
                'num'           => $goods['num'],   //交易总额
                'addtime'       => time(),
                'endtime'       => time() + config('deal_timeout'),
                'add_id'        => $add_id,
                'goods_id'      => $goods['id'],
                'goods_count'   => $goods['count'], //交易数量
                //'commission'    => $goods['num']*config('vip_1_commission'),
                //'commission'    => $goods['num']*$cate['bili'],  //交易佣金按照分类
                'commission'    => $commission,  //交易佣金按照会员等级
                'day_order_idx' =>  $day_order_idx
            ]);
        if ($res && $res1) {
            Db::commit();
            return ['code' => 0, 'info' => '抢单成功!', 'oid' => $id];
        } else {
            Db::rollback();
            return ['code' => 1, 'info' => '抢单失败!请稍后再试'];
        }
    }

    /**
     * 随机生成订单
     */
    private function rand_order($min, $max, $cid)
    {
        $num = mt_rand($min, $max); //随机交易额
        $goods = Db::name('xy_goods_list')
            ->orderRaw('rand()')
            ->where('goods_price', 'between', [0, $num])
            ->where('status', '=', 1)
            ->where('cid', '=', $cid)
            ->find();

        if (!$goods) {
            echo json_encode(['code' => 1, 'info' => '抢单失败, 该分类库存不足!']);
            die;
        }

        // $count = round($num / $goods['goods_price']); //
        // if ($count * $goods['goods_price'] < $min || $count * $goods['goods_price'] > $max) {
        //     self::rand_order($min, $max, $cid);
        // }
        $count = 1;
        return ['count' => $count, 'id' => $goods['id'], 'num' => $count * $goods['goods_price'], 'cid' => $goods['cid']];
    }

    // 0待付款 1交易完成 2用户取消  3强制完成 4强制取消  5交易冻结 6连单
    public static function statusList($type = -1)
    {
        $list = [
            0 => '待付款',
            1 => '交易完成',
            2 => '用户取消',
            3 => '强制完成',
            4 => '强制取消',
            5 => '交易冻结',
            6 => '预派送',
        ];
        if ($type == -1) {
            return $list;
        } else {
            return $list[$type] ?? '其他';
        }
    }

    /**
     * 处理订单
     *
     * @param string $oid      订单号
     * @param int    $status   操作      1会员确认付款 2会员取消订单 3后台强制付款 4后台强制取消
                                        订单状态 0待付款 1交易完成 2用户取消  3强制完成 4强制取消  5交易冻结 6连单
     * @param int    $uid      用户ID    传参则进行用户判断
     * @param int    $uid      收货地址
     * @return array
     */
    public function do_order($oid, $status, $uid = '', $add_id = '')
    {
        // return $status;
        $info = Db::name('xy_convey')->find($oid);    //获取订单信息
        if (!$info) return ['code' => 1, 'info' => '订单号不存在'];
        if ($uid && $info['uid'] != $uid) return ['code' => 1, 'info' => '参数错误，请确认订单号!'];
        if (!in_array($info['status'], [0, 5])) return ['code' => 1, 'info' => '该订单已处理！请刷新页面'];
        // if($info['status']!=0) return ['code'=>1,'info'=>'该订单已处理！请刷新页面'];   //0待付款1交易完成2用户取消3强制完成4强制取消5交易冻结
        $uinfo = Db::name('xy_users')->find($info['uid']);
        $taskOrder = Db::name('xy_convey')->where('id', $oid)->find();
        // 判断余额是否小于0
        if ($uinfo['balance'] <= 0) {
            return ['code' => 1, 'info' => '余额不足,请充值!'];
        }
        if ($uinfo['balance'] + $uinfo['freeze_balance'] - $taskOrder['num'] <= 0) {
            Db::name('xy_users')->where('id', $info['uid'])
                    ->dec('balance', $taskOrder['num'])
                    ->inc('freeze_balance', $taskOrder['num'])
                    ->update();
            Db::commit();
            return ['code' => 1, 'info' => '余额不足!'];
        } else {
            Db::name('xy_users')->where('id', $info['uid'])
                    ->inc('balance', $uinfo['freeze_balance'])
                    ->dec('freeze_balance', $uinfo['freeze_balance'])
                    ->update();
            $uinfo['freeze_balance'] = 0;
            $uinfo['balance'] = ($uinfo['balance'] + $uinfo['freeze_balance']);
            Db::commit();
        }

        $tmp = ['endtime' => time() + config('deal_feedze'), 'status' => 5];
        $add_id ? $tmp['add_id'] = $add_id : ''; //如果存在add_id 那么保存 add_id 收货地址
        Db::startTrans();
        $res = Db::name('xy_convey')->where('id', $oid)->update($tmp);  //冻结订单
        if (in_array($status, [1, 3])) { //1会员确认付款 2会员取消订单 3后台强制付款 4后台强制取消
            $res1 = 1;
            $res2 = Db::name('xy_balance_log')->insert([  //添加交易记录
                'uid'           => $info['uid'],
                'oid'           => $oid,
                'num'           => $info['num'],
                'type'          => 2,
                'status'        => 2,
                'addtime'       => time()
            ]);
            if ($status == 3) {
                Db::name('xy_message')->insert(['uid' => $info['uid'], 'type' => 2, 'title' => '系统通知', 'content' => '交易订单' . $oid . '已被系统强制付款，如有疑问请联系客服', 'addtime' => time()]);    //强制取消时发送信息给用户
                
                
                // 扣除并冻结余额；增加抢单次数
                $freeze_balance = $taskOrder['num'] + $taskOrder['commission'];
                Db::name('xy_users')->where('id', $info['uid'])
                    ->dec('deal_count')
                    ->dec('balance', $taskOrder['num'])
                    ->inc('freeze_balance', $freeze_balance)
                    ->update();
                $today_order_num = $this->today_order_num($info['uid']);
                $day_order_idx = $today_order_num + 1;
                // Db::name('xy_convey')->where('id', $taskOrder['id'])->update(['status' => 1, 'day_order_idx' => $day_order_idx]);
                Db::commit();
                return ['code' => 0, 'info' => '强制付款成功!', 'oid' => $taskOrder['id']];
            }
            if ($status == 1) {                
                // 扣除并冻结余额；增加抢单次数
                Db::name('xy_users')->where('id', $info['uid'])
                    ->dec('deal_count')
                    ->inc('balance', $taskOrder['commission'])
                    ->update();
                $today_order_num = $this->today_order_num($info['uid']);
                $day_order_idx = $today_order_num + 1;
                Db::name('xy_convey')->where('id', $taskOrder['id'])->update(['status' => 1, 'day_order_idx' => $day_order_idx]);
                Db::commit();
                
                return ['code' => 0, 'info' => '付款成功!', 'oid' => $taskOrder['id']];
            }
            //系统通知
            if ($res && $res1 && $res2) {  //如果成功冻结订单且成功添加交易记录
                Db::commit();
                $c_status = Db::name('xy_convey')->where('id', $oid)->value('c_status');   //获取订单状态
                //判断是否已返还佣金
                if (!empty($info['type'])) {  //如果存在订单类型 判断连单
                    $this->deal_task_order($info);

                    // 连单处理开始   连单先扣除余额并生成订单,执行确认操作再判断余额是否大于0
                    $taskOrder = Db::name('xy_convey')->where('uid', $uid)->where('status', 6)->find();
                    if ($taskOrder) {

                        $today_order_num = $this->today_order_num($uid);
                        $day_order_idx = $today_order_num + 1;

                        $uinfo = Db::name('xy_users')->field('deal_status,balance,level')->find($uid);

                        $level = $uinfo['level'];
                        !$uinfo['level'] ? $level = 0 : '';
                        $ulevel = Db::name('xy_level')->where('level', $level)->find();
                        /*if ($uinfo['balance'] < $ulevel['num_min']) {
                            return ['code'=>1,'info'=>'会员等级余额不足!'];
                        }*/
                        // return json_encode($uinfo,JSON_UNESCAPED_UNICODE);
                        if ($today_order_num >= $ulevel['order_num']) {
                            return ['code' => 1, 'info' => '当前等级抢单次数已达最大值'];
                        }
                        if ($uinfo['balance'] < 0 && !strpos($oid, "加急单")) {
                            return ['code' => 1, 'info' => '您的余额不足'];
                        }

                        // 扣除并冻结余额；增加抢单次数
                        $freeze_balance = $taskOrder['num'] + $taskOrder['commission'];
                        Db::name('xy_users')->where('id', $uid)
                            ->dec('deal_count')
                            ->inc('balance', $taskOrder['commission'])
                            ->update();
                        Db::name('xy_convey')->where('id', $taskOrder['id'])->update(['status' => 0, 'day_order_idx' => $day_order_idx]);
                        // $this->add_pre_order($uid);
                        return ['code' => 2, 'info' => '抢单成功!', 'oid' => $taskOrder['id']];
                    }
                    // 连单处理结束



                } else if ($c_status === 0) {
                    $this->deal_reward($info['uid'], $oid, $info['num'], $info['commission']);
                }
                // $this->add_pre_order($uid);
                return ['code' => 0, 'info' => '操作成功!'];
            } else {
                Db::rollback();
                return ['code' => 1, 'info' => '操作失败'];
            }
        } elseif (in_array($status, [2, 4])) {
            $res1 = Db::name('xy_users')->where('id', $info['uid'])->update(['deal_status' => 1]);
            if ($status == 4) Db::name('xy_message')->insert(['uid' => $info['uid'], 'type' => 2, 'title' => '系统通知', 'content' => '交易订单' . $oid . '已被系统强制取消，如有疑问请联系客服', 'addtime' => time()]);
            //系统通知
            if ($res && $res1 !== false) {
                Db::commit();
                return ['code' => 0, 'info' => '操作成功!'];
            } else {
                Db::rollback();
                return ['code' => 1, 'info' => '操作失败', 'data' => $res1];
            }
        }
    }

    //增加预派送单子
    protected function add_pre_order($uid)
    {
        $pre_order = Db::name('xy_pre_order')->where('uid', $uid)->where('status', 0)->order('order_num asc')->find();  //查找该用户的预派送单列表
        if (!empty($pre_order)) {  //如果存在该用户的预派送单
            $where = [
                'uid' => $uid,
                'status' => 1
            ];
            $date = date('Y-m-d');
            $date = strtotime($date);
            $finish_num = Db::name('xy_convey')->where($where)->where('addtime', '>=', $date)->count(); //获取大于等于当前时间的完单数量
            if ($finish_num >= $pre_order['order_num']) {
                $data_arr = explode('|', $pre_order['goods_id']);
                $goods_num_idx_arr = [];
                foreach ($data_arr as $item) {
                    $goods_num_arr = explode(':', $item);
                    $goods_id = $goods_num_arr[0];
                    $goods_num = $goods_num_arr[1];
                    $goods_num_idx_arr[$goods_id] = $goods_num;
                }
                $uinfo = Db::name('xy_users')->field('id,level')->find($uid);
                $level = $uinfo['level'];
                !$uinfo['level'] ? $level = 0 : '';
                $ulevel = Db::name('xy_level')->where('level', $level)->find();
                $goodsList = Db::name('xy_goods_list')->where('id', 'in', array_keys($goods_num_idx_arr))->column('id, goods_price');
                $i = 1;
                $id = getSn('UB');
                $order_count = count($goods_num_idx_arr);
                $type = time();
                $end = 60 * 60 * 24 * 360;
                foreach ($goods_num_idx_arr as $goods_id => $goods_num) {
                    $goods_price = $goodsList[$goods_id];
                    $total = $goods_num * $goods_price;
                    $commission = $total * $ulevel['bili'] * 5;
                    if ($order_count == 1) {
                        $order_id = $id;
                    } else {
                        $order_id = $id . "(加急单" . $i . "/" . $order_count . ")";
                    }
                    $i++;
                    Db::name('xy_convey')
                        ->insert([
                            'id'            => $order_id,
                            'uid'           => $uid,
                            'num'           => $total,  //交易金额
                            'addtime'       => $type + $i,
                            'endtime'       => time() + $end,
                            'add_id'        => 1,
                            'goods_id'      => $goods_id,
                            'goods_count'   => $goods_num,
                            'status'        => 6,
                            'type'          => $type,
                            'commission'    => $commission,  //交易佣金按照会员等级
                        ]);
                }
                Db::name('xy_pre_order')->where('id', $pre_order['id'])->update(['status' => 1]);  //将订单设置为已处理
            }
        }
    }

    // 连单处理
    private function deal_task_order($convey)
    {
        if (empty($convey['type'])) {
            return false;
        }
        $cond = [
            'uid' => $convey['uid'],
            'type' => $convey['type'],
        ];
        // 未完成连单
        $undone = Db::name('xy_convey')->where($cond)->whereNotIn('status', '1,3,5')->find();
        if (!empty($undone)) {
            return false;
        }
        // 完成连单返佣
        $taskOrder = Db::name('xy_convey')->where($cond)->where('c_status', 0)->select();   //查找佣金未发放的连单
        foreach ($taskOrder as $item) {
            $this->deal_reward($item['uid'], $item['id'], $item['num'], $item['commission']);    //用户id 订单id 交易金额 佣金
        }
    }

    /**
     * 交易返佣
     *
     * @return void
     */
    public function deal_reward($uid, $oid, $num, $cnum)
    {
        //$res = Db::name('xy_users')->where('id',$uid)->where('status',1)->setInc('balance',$num+$cnum);
        $res = Db::name('xy_users')->where('id', $uid)->where('status', 1)->setInc('balance', $num + $cnum);  //返还佣金
        $res2 = Db::name('xy_users')->where('id', $uid)->where('status', 1)->setDec('freeze_balance', $num + $cnum); //返还冻结佣金

        if ($res) {  //如果返还佣金成功
            $res1 = Db::name('xy_balance_log')->insert([    //记入交易记录
                //记录返佣信息
                'uid'       => $uid,
                'oid'       => $oid,
                //'num'       => $num+$cnum,
                'num'       => $cnum,
                'type'      => 3,
                'addtime'   => time()
            ]);
            //将订单状态改为已返回佣金
            Db::name('xy_convey')->where('id', $oid)->update(['c_status' => 1, 'status' => 1]);
            Db::name('xy_reward_log')->insert(['oid' => $oid, 'uid' => $uid, 'num' => $num, 'addtime' => time(), 'type' => 2]); //记录充值返佣订单
            /************* 发放交易奖励 *********/
            $userList = model('admin/Users')->parent_user($uid, 5);    //获取上级会员
            if ($userList) {
                foreach ($userList as $v) {
                    if ($v['status'] === 1) {
                        Db::name('xy_reward_log')
                            ->insert([
                                'uid'       => $v['id'],
                                'sid'       => $uid,
                                'oid'       => $oid,
                                'num'       => $cnum * config($v['lv'] . '_d_reward'),
                                'lv'        => $v['lv'],
                                'type'      => 2,
                                'status'    => 1,
                                'addtime'   => time(),
                            ]);
                        $res1 = Db::name('xy_balance_log')->insert([
                            //记录返佣信息
                            'uid'       => $v['id'],
                            'oid'       => $oid,
                            'sid'       => $uid,
                            'num'       => $cnum * config($v['lv'] . '_d_reward'),
                            'type'      => 6,
                            'status'    => 1,
                            'f_lv'        => $v['lv'],
                            'addtime'   => time()
                        ]);

                        $num3 = $cnum * config($v['lv'] . '_d_reward'); //佣金
                        $res = Db::name('xy_users')->where('id', $v['id'])->where('status', 1)->setInc('balance', $num3); //给上级会员返佣
                    }
                }
            }
            /************* 发放交易奖励 *********/
        } else {
            $res1 = Db::name('xy_convey')->where('id', $oid)->update(['c_status' => 2]); //记录账号异常 如果返佣失败 冻结佣金
        }
    }
}
