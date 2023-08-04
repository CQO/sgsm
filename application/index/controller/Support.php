<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Support extends Base
{
    /**
     * 首页
     */
    public function index()
    {
        $uid=session('user_id');
        if (!empty($uid)) {
            $tel=db('xy_users')->where('id', $uid)->value('tel');
        }
        $list = db('xy_cs')->where('status',1)->select();
        if (!empty($tel) &&  $list) {
            foreach ($list as &$item) {
                $replace_str='visiter_name='.$tel;
                $item['url']=str_replace('visiter_name=', $replace_str, $item['url']);
            }
        }
        $this->assign('list',$list);

        $this->msg = db('xy_index_msg')->where('status',1)->select();
        return $this->fetch();
    }


    public function index2()
    {
        $this->url = isset($_REQUEST['url']) ? $_REQUEST['url'] :'';
        return $this->fetch();
    }

    /**
     * 首页
     */
    public function detail()
    {
        $id = input('get.id/d',1);
        $this->info = db('xy_index_msg')->where('id',$id)->find();


        return $this->fetch();
    }




    /**
     * 换一个客服
     */
    public function other_cs()
    {
        $data = db('xy_cs')->where('status',1)->where('id','<>',$id)->find();
        if($data) return json(['code'=>0,'info'=>'请求成功','data'=>$data]);
        return json(['code'=>1,'info'=>'暂无数据']);
    }
}