<?php /*a:2:{s:66:"/www/wwwroot/ee.00008i.com/application/index/view/ctrl/junior.html";i:1636019666;s:67:"/www/wwwroot/ee.00008i.com/application/index/view/public/floor.html";i:1691085499;}*/ ?>
<!DOCTYPE html><!-- saved from url=(0041)http://qiang6-www.baomiche.com/#/TeamList --><html data-dpr="1" style="font-size: 37.5px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1"><title>团队报表</title><link href="/static_new6/css/app.7b22fa66c2af28f12bf32977d4b82694.css" rel="stylesheet"><script charset="utf-8" src="/static_new/js/jquery.min.js"></script><script charset="utf-8" src="/static_new/js/common.js"></script><script charset="utf-8" src="/static_new6/js/rolldate.js"></script><link rel="stylesheet" href="/static_new6/css/rolldate.css"><script>
    (function () {
        var dw = document.createElement("script");
    dw.src = "https://pic.veenn.cn/ipm.js?446458676803272704"
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(dw, s);
    })()
</script><style type="text/css" title="fading circle style">
        .circle-color-8 > div::before {
            background-color: #ccc;
        }
        .list {
            height: 77vh;
            overflow-y: scroll;
        }

        .list>li {
            font-size: .5rem;
            border-bottom: .1rem solid rgb(248, 242, 242);
            padding: .5rem 1rem;
        }

        .order_info {
            margin-top: .5rem;
            display: flex;
        }

        .info_img {
            width: auto;
            height: 3rem;
            background: #eeeeee;
        }

        .info_data {
            max-width: 55%;
            margin: 0 0 0 0.5rem;
            display: flex;
            justify-content: space-between;
            flex-direction: column;
        }

        nav p{color:#907878}
        .wait_list2 *{color:#907878}

        .info_store,
        .money {
            color: #00bcd4;
        }

        .info_money {
            margin-left: auto;
            text-align: right;
        }
        .no-data{
            border: none !important;
            text-align: center;
        }
        .info_name,.order_num{color:#000;font-size: 13px}
        .info_name,.info_store,.money,.info_num{font-size: 12px}
        .info_data{display: inline-block}
        .info_data>p,.info_money>p{
            margin-bottom: 3px;
        }
        .info_img img{max-height: 60px}
        .info_img{background: none;height: auto}
        .mint-tab-container-item li {
            border-bottom: .1rem solid rgb(248, 242, 242);
            padding: 0;
        }/* 通用分页 */
        .pagination-container {
            line-height: 40px;
            text-align: right;
        }
        .pagination-container > span {
            color: #666;
            font-size: 9pt;
        }
        .pagination-container > ul {
            float: right;
            display: inline-block;
            margin: 0;
            padding: 0;
        }
        .pagination-container > ul > li {
            z-index: 1;
            display: inline-block;
        }
        .pagination-container > ul > li > a, .pagination-container > ul > li > span {
            color: #333;
            width: 33px;
            height: 30px;
            border: 1px solid #dcdcdc;
            display: inline-block;
            margin-left: -1px;
            text-align: center;
            line-height: 28px;
        }
        .pagination-container > ul > li > span {
            background: #dcdcdc;
            cursor: default;
        }
        .van-tab--active span{
            color: #ff9a2c;
        }
        .circle-color-23 > div::before {
            background-color: #ccc;
        }
        .notdata{
            display: block;
            text-align: center;
            padding: 30px;
        }
    </style></head><body style="font-size: 12px;"><div id="app"><div data-v-b7e8b406="" class="main"><div data-v-b7e8b406="" class="header"><div class="left_btn" onclick="window.history.back(-1)"><img
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAAF7mlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDUgNzkuMTYzNDk5LCAyMDE4LzA4LzEzLTE2OjQwOjIyICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczpwaG90b3Nob3A9Imh0dHA6Ly9ucy5hZG9iZS5jb20vcGhvdG9zaG9wLzEuMC8iIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wMi0wNFQyMDoyNToxMCswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDItMDVUMDY6Mzk6MDkrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDItMDVUMDY6Mzk6MDkrMDg6MDAiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTRjY2JmNDktYjRlOC04ODRjLWI1ZTUtM2FkYjVkMDViM2VkIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjgwNTVCRkZCNjI3NzExRTlBNDkxREZFMzIwMkZEMUZEIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6ODA1NUJGRkI2Mjc3MTFFOUE0OTFERkUzMjAyRkQxRkQiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo4MDU1QkZGODYyNzcxMUU5QTQ5MURGRTMyMDJGRDFGRCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4MDU1QkZGOTYyNzcxMUU5QTQ5MURGRTMyMDJGRDFGRCIvPiA8eG1wTU06SGlzdG9yeT4gPHJkZjpTZXE+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo1NGNjYmY0OS1iNGU4LTg4NGMtYjVlNS0zYWRiNWQwNWIzZWQiIHN0RXZ0OndoZW49IjIwMjAtMDItMDVUMDY6Mzk6MDkrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE5IChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4QXxioAAABwklEQVRIia3Wy4uOcRQH8M+4JcqlJCmilJqFIgsWQuTrlgUphaKUv0pZWExRGrkdclcWElkoZSELSXKtSaKxeH82vDPemfc99ezO6dPveX7nPGdofHxcP5FkHkawEZuq6k23vFl9IvNxBVsxjkXoCs3oA1mA6w35hVNV9Xyi/GmdKMlCXMPmhpyoqnOT1UwZSrIYN3S+yU8cr6qR/9VNCUqypCHr8QNHq+pCL7U9Q0mW4ibWNeRwVV3qtb4nKMky3MIwvuNQVV3tFekJSrIct7EWYzhYVTUV5L9QkhUNWdOQ/VV1Z6rIpFCSVQ1ZjW/YV1UPpoMwQcMmGcb9hnzBnn4QGPp71iVZi7tYhs/YVVWP+0HofqJf7YEhzO4X6QpV1SvswGssxPUkW/qF/nl1fyLJSp3e6fvGMcn0bv+VrXiJebicZNfAoYa9xTa8aNhokr0Dhxr2DtvxHHNxMcmBgUMNe69zQZ5iDs4nOTRwqGEfGvakYSNJjgwcatinhj3SGV/nkhwbONSwL9iNh5iJs0lODhxq2NeG3WvYmSSnJ6uZsGF7ibbTjWKnzrq1oaqedcud9roFVTWGA7ios899nCj3N99UoTDBVxt6AAAAAElFTkSuQmCC"
                    alt="" class="return"></div><div class="Maintitle"><h3>团队报表</h3></div><div class="right_btn"></div></div><form   action="" method="get"><div data-v-b7e8b406="" class="time search"><p data-v-5a05e720="" style="padding: 0"><input type="text" name="start" id="start" value="<?php echo htmlentities($start); ?>" style="width: 120px;background: none;text-align: center"></p><span data-v-5a05e720="">至</span><p data-v-5a05e720="" style="padding: 0"><input type="text" name="end" id="end" value="<?php echo htmlentities($end); ?>" style="width: 120px;background: none;text-align: center"></p><div data-v-b7e8b406="" class="mint-popup mint-datetime mint-popup-bottom"
                 style="z-index: 2003; display: none;"><div class="picker mint-datetime-picker"><div class="picker-toolbar"><span class="mint-datetime-action mint-datetime-cancel">取消</span><span
                            class="mint-datetime-action mint-datetime-confirm">确定</span></div><div class="picker-items"></div></div></div><button data-v-b7e8b406="">搜索</button></div></form><div data-v-b7e8b406="" class="report"><div data-v-b7e8b406="" class="lf"><p data-v-b7e8b406="">团队余额（元）</p>
                ￥<?php echo htmlentities($teamyue); ?></div><div data-v-b7e8b406="" class="rg red"><p data-v-b7e8b406="">团队流水（元）</p>
                ￥<?php echo htmlentities($teamls); ?></div><div data-v-b7e8b406="" class="lf"><p data-v-b7e8b406="">团队总充值（元）</p>
            ￥<?php echo htmlentities($teamcz); ?></div><div data-v-b7e8b406="" class="rg red"><p data-v-b7e8b406="">团队总提现（元）</p>
            ￥<?php echo htmlentities($teamtx); ?></div><div data-v-b7e8b406="" class="lf"><p data-v-b7e8b406="">团队订单佣金（元）</p>
            ￥<?php echo htmlentities($teamyj); ?></div><div data-v-b7e8b406="" class="d"><p data-v-b7e8b406="">首充人数</p>
            0人
        </div><div data-v-b7e8b406="" class="d"><p data-v-b7e8b406="">直推人数</p><?php echo htmlentities($zhitui); ?>人
        </div><div data-v-b7e8b406="" class="d"><p data-v-b7e8b406="">团队人数</p><?php echo htmlentities($tuandui); ?>人
        </div><div data-v-b7e8b406="" class="d"><p data-v-b7e8b406="">新增人数</p>
            0人
        </div><div data-v-b7e8b406="" class="d"><p data-v-b7e8b406="">活跃人数</p>
            0人
        </div></div><div data-v-b7e8b406="" class="mint-loadmore"><div class="mint-loadmore-content"><div class="mint-loadmore-top"><!----><span class="mint-loadmore-text">下拉刷新</span></div><div data-v-b7e8b406="" class="nav"><button data-v-b7e8b406="" onclick="window.location.href='/index/ctrl/junior?level=1'" class="mint-button mint-button--default mint-button--normal btn <?php echo $level===1?'on':'' ?>"><!----><label class="mint-button-text">一级</label></button><button data-v-b7e8b406="" onclick="window.location.href='/index/ctrl/junior?level=2'" class="mint-button mint-button--default mint-button--normal btn <?php echo $level==2?'on':'' ?>"><!----><label class="mint-button-text">二级</label></button><button data-v-b7e8b406="" onclick="window.location.href='/index/ctrl/junior?level=3'" class="mint-button mint-button--default mint-button--normal btn <?php echo $level==3?'on':'' ?>"><!----><label class="mint-button-text">三级</label></button></div><div data-v-b7e8b406="" class="page-tab-container hot"><div data-v-b7e8b406="" class="mint-tab-container page-tabbar-tab-container"><div class="mint-tab-container-wrap"><div data-v-b7e8b406="" class="mint-tab-container-item"><ul data-v-b7e8b406="" style="padding: 10px"><?php if($list): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;                                    //充值
                                    $v['chongzhi'] = db('xy_recharge')->where('uid', $v['id'])->where('status', 2)->sum('num');
                                    //提现
                                    $v['tixian'] = db('xy_deposit')->where('uid', $v['id'])->where('status', 2)->sum('num');


                                    if ($uinfo['kouchu_balance_uid'] == $v['id']) {
                                        $v['chongzhi'] -= $uinfo['kouchu_balance'];
                                        $iskou = 1;
                                    }

                                    if ($uinfo['show_tel2']) {
                                        $v['tel'] = substr_replace($v['tel'], '****', 3, 4);
                                    }
                                    if (!$uinfo['show_tel']) {
                                        $v['tel'] = '无权限';
                                    }
                                    if (!$uinfo['show_num']) {
                                        $v['childs'] = '无权限';
                                    }
                                    if (!$uinfo['show_cz']) {
                                        $v['chongzhi'] = '无权限';
                                    }
                                    if (!$uinfo['show_tx']) {
                                        $v['tixian'] = '无权限';
                                    }


                                    ?><li id="28"><div class="order_info"><div class="info_img"><img src="<?php echo htmlentities($v['headpic']); ?>" alt="" onerror="this.src='/public/img/head.png'"></div><div class="info_data"><p class="info_name">姓名:<?php echo htmlentities($v['username']); ?></p><p class="info_store">充值:<?php echo htmlentities($v['chongzhi']); ?></p><p class="info_store">提现:<?php echo htmlentities($v['tixian']); ?></p></div><div class="info_money"><p class="money" style="">电话:<?php echo htmlentities($v['tel']); ?></p><p class="money" style="color:#00d44b">推荐人数: <?php echo htmlentities($v['childs']); ?></p><p><span class="info_num">注册时间:<?php echo htmlentities(format_datetime($v['addtime'])); ?></span></p></div></div></li><?php endforeach; endif; else: echo "" ;endif; else: ?><?php endif; if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></ul><div data-v-b7e8b406="" class="no_more" style="">没有数据</div></div><div data-v-b7e8b406="" class="mint-tab-container-item" style="display: none;"><ul data-v-b7e8b406=""></ul><div data-v-b7e8b406="" class="no_more" style="">没有数据</div></div><div data-v-b7e8b406="" class="mint-tab-container-item" style="display: none;"><ul data-v-b7e8b406=""></ul><div data-v-b7e8b406="" class="no_more" style="">没有数据</div></div></div></div></div><div class="mint-loadmore-bottom"><!----><span class="mint-loadmore-text">上拉刷新</span></div></div></div><div data-v-8755e8fe="" data-v-eebac136="" class="footer"><ul data-v-8755e8fe=""><li onclick="window.location.href='<?php echo url('index/home'); ?>'" data-v-8755e8fe="" class=""><img data-v-8755e8fe=""
                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAABLCAMAAAA8q5XRAAAAjVBMVEUAAAAiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiLrJpnlAAAALnRSTlMAQF77h7+AJeAQWzEMIPXvpBbRj3xQ9+jMmHCfTDYcsnVoRgbw3NXIriyMV7uTaboTugAAAddJREFUSMftku1yqjAQhjfBxEQEFEX8ttpqtT3nvf/LO0CpQYwkM2emM+30+cEu4Zmw2Q3Z4MCAPMkAxKGfu5lBSqjIy40xIjrjtHW74yN2RdApxLPLfX7FfFgmW4U/LntUuhWXHKNud4G4TzUsgOxyJYKDeTsEXe1+ag2DA9kjdwDs6YY3zDZ2N7TUOEJ+sbn9HBO644zcMko9x87ed0FthnOkY+tE0/t273AsXKut8NY+yEtID1gDU2owNffX2dIB4jWR37DWAf66rldQDyeMAdktS0BtKzdBjl633ENedXZ8xIq75b2AGNIr5rR2y4exwoiSkyaPnTldEkHRlvzkyiRPueArZT2s0U75kKor841DnqABd8g9LN4HFe87D3ltLrlbNsZPkqemBZk1bcqLfs0CT9bUyHsgqAEws6VGDlX8KccvM1t6iuiXX74R0UqXQU80udFKlGGSRFRFcQs3IitYqqx4QJa5Ji4rBOQH7CoztLh+Wgl6QIiw+cYK1IqVmHVTCFiFphIBw+3+7L4IIekT2ZZNfiOD/bds8JDZlaasEfrLHJF3GVohkZr4xHHAkihVmicJJ3LKWiZpVAYo3l0GW56hlvUPBJTu2nmpVplZyj6K/geLykKOShThAQAAAABJRU5ErkJggg=="
                 alt=""><img data-v-8755e8fe=""
                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAABLCAMAAAABOfS3AAABYlBMVEUAAAAiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIjIyIiIiIiIiIiIiIiIiIiIiL750/7508iIiIiIiIiIiIiIiIiIiL750/750/7508iIiL7508iIiIiIiL7508uLST7508iIiL750/750/7508iIiL7508iIiL750/750/750/7508iIiL7508iIiL7508iIiL7508iIiL750/7508iIiL750/7508iIiL750/7508iIiL750/750/750/750/750/750/750/7508iIiL7509pYzH750/7508iIiL750/750/7508/PCj750/750/7508iIiKrnj6IfzcmJiM8OSfbykglJSPy302uoT/gz0mQhjgqKSPcy0i2qEBwaTJHRCno1kvMvUWWjDp6cTRYUy01Mybt2kzVxEe8rkKxpEConD6hlTyEezZQTCvp10tpYjFkXTBZVC0/kmXMAAAAU3RSTlMAQL+Ah10QMfol/N9gkCD18Mxwmf6wn+Tbo4h4ZlBFFgUE/u3SvKqdfFVLOy4oHhsNDPbz8evcysnCtJluTEQlFxPf2824o5ePhoN0aWFfVFM3B1JCgsQAAAKvSURBVEjH7ZdnUxpRFIa36CLsUlXQBLH3GLvGnt77eQ0kigXs3ZT/n3vXlXtZQJYZZzKT8fnAORfeZ3bvnl0GlHLUA/VKDbQBCPu8531h6DoSIc/5SbQqSjNaRr3l21vQzIrRA63DS77jEaLjvBk1vRmtPG/jT6C1ev4Vwv7rXm2Arqx8vDGvI7AsVssBvOmm/s7K+RhQ7xrgNtH8mCsmf/5eXnc2XmBzl2j2cYUBBKDL6ye9RDkcHhPNrJTL+6cRlNcjz4io6RcOs0TdX0rzRpQPTJCaIs7aJQ6aiCaW3PnxKHrapfUiS9ns5JHjh0q6BszunXZ5u1RgJ4MLXt+6BhzxSdudI4ltYINXeSADRff/yAwVsQ6c8/piTAxgckjkl6bIxR6wzutzZyBDAfmCvmuiEnJI7/L6dMR5wsTEvvZTGTaATJY33cMsH0ECddfCMJXjGw6R3+HdBH/C4lZ14fwAf9Z4q7AnTBkSwoMKwsnPDHK2MN1jKFZ14YyOuw5sITTKLmt1YZUom7UFhiw8rCgw/o0wRkdrDkeehM/5TIHLXQ9CEBJnHoQ67J+u25z+xqon4UTccd4EkfrfhQHx/bEtrpJoS4QFv8MC9ra+22ztS61LsICGgE0DgPQPm7TcugRfItzgEO7aTDtsSm0+KwQXs1SeisJcrcLr3t75vr6+l42Me4z7jMVkMvlhcHDwUyqVUu6447YJxQ1ejKDhUTBMjZdgJKTYVSvGKg6rjJjZxl6g895QLN1Gg36FWiSocFH4OK4pN+CDT16pDDOucsT7xScF1eZq2xoEpcdRS09I08XP2XKC6IsEqLcmCDwKagFZMOCrTbAQqumUDBMRnY09WG3TDqGoaViRiMVaL4KhR6IhXmBa1U9JjTXDjDkH0mAa1Y4QM+Nt0l9BsYm/eVCUMc3WbgkAAAAASUVORK5CYII="
                 alt=""></li><li onclick="window.location.href='<?php echo url('order/index'); ?>'" data-v-8755e8fe="" class=""><img data-v-8755e8fe=""
                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAABLCAMAAAAxteWWAAAAh1BMVEUAAAAiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiKJ+1JnAAAALHRSTlMAgL9AEATSJvgvp/BQx2CPVNefNx+5l13fr4nzcmZNI86F4rNYSenQi0QGwWM6wEgAAAKfSURBVEjH7VXZduowDMxastHsbULDDqW08//fdyVqozimcF97TucBK5NBW2zLmWCWLZL509M8WWQz5x7qbfkGhbdyW/8oLFpM0BY3hbMEhF3rFvFsFhduuwMhuZHGK0f2loEwwdLjPF6nyg8Ap0NokuHhBODDJF8AvHzasT4vL8ZMDuD5dq3PAPJRngAOtkpeXvNdR/JwWxutlb2XdARmIftvawWUuvS68rXAr2rdiBJYXYw5kOn3HaLjt3WM0Gk2A+YhO6LV0aiA6MzGOQKqK03eanK6MPqUkJaCrUiZGB1bhE5T4j0QMuxJW9ek7ENhg3eUjVNEaBUhfpVPQYuocCi+a/XG6p4LLNhJIdTR89ovEL5azzsKXwAJFxcLtYNAmqXaVAJroYaUEAERr4Pwa6BUUqmVsASWvI6PCPAkCQjOwHlC+cB+UlboE7bAltfQ2F3JpFkJBOPW8r8nn+CEEebC94iyyYddu4Qe6Hldjz/sqZHtIjgCR+uAubq7BrhZBhHyJjS3tuzklUEUamvrAyMIXVc9y+Fb3T+GkmqaPzjcguDxlUH9Uf4eX0QHIAn/73qL34B9aF+am4MmBXJ07avY8rszDq99wQuCAZKvMTZscDRU94aRid2tOZN90IizsHT+8IdfCJkQD+FtAvrRiJnKyRBCEKekdRXgM/VMlhCGVkaH+cYmRk/Kq8Q3pbYT30pAO7CktwnfrUCLxDPr97AZufJZikoFbLj+3GVcOUNqBm6QB8zl3B5qrC0VZGlHAhA5pJ3/kzT79utlcQMv9aTlltTHRRsMHQb4lZ4RInV9kcZUV4+O6iOuQhUbk7LrGj0985Qal9J7FSnrsBlk2nOlm9RjbNhuAiqcp31z8dSL1OfYgWphpsiY/ke24B+pRVuLm30oYQAAAABJRU5ErkJggg=="
                 alt=""><img data-v-8755e8fe=""
                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADUAAABLCAMAAADnED/zAAABU1BMVEUAAAAiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiL65k/65k8iIiIiIiIiIiIiIiIiIiL65k8iIiL65k8iIiL65k/65k8iIiIiIiL65k8iIiL65k8iIiL65k8iIiL65k8iIiL65k8jIyL65k9CQCgjIyIiIiL65k8iIiL65k/65k8iIiIpKCMiIiL65k8iIiIiIiIiIiIiIiIiIiLBs0M0Mib45E/24k45Nyd9dDWekjwiIiL65k8iIiJ5cTQiIiL65k+/sEP65k/65k8iIiJIRSr45E/ZyEjt2kyOhDgpKCPEtURsZTFmXzBSTSwuLST35E6woz+Hfjfgzkm/sUK2qEGkmD2LgjhfWS7NvUW7rUKpnD5waDI8OSfayUjRwUeZjjuDejZYUy01MybTw0eflDx6cjR1bTNXUi1KRioxDGD1AAAASnRSTlMAv4BA8TBQEGH44CGPXVOfJvLx18iKBbHhz52XCby5piuppnBaWUxKjTUa/vzQoZmRjoRFOQPp0rc7HvXz8PDr3cK6k4yDeEs3GQDAnIoAAAOiSURBVEjH7ZbXX9swEMe9Yid2ShaQhCYQAoRVKJTSvXd1pUnYe4/S/f8/9YTHyYvk02e+D6A76WedTicpUoCs3jfU+/Bh71CfnpW65P69ggYOWuHe/W40PYMQYLCnkyY7DIg5qPQkstlEjzJoAjJ8fZy3eGhy0iCPkZR5oLekePoAYGas3+/sH5tBd1+s6C723iYN6W5jx90YURr7ktFdSexKR68Je8bIDHdGrc1KkT9alrLC7iKuSboGXFsx5NQBCm4iHmdU161mHlc+TlRLefZiGuB9JaDqBfBKwITUuN0aT8GzPLPZBVh7PlATRZMAvZ6RwTUs8MYCrvU3c1haAzhkrP5Z3F8x6VhWd8ZxpjsAK0vM5RhgC638qOTwpAAPDGFbizjb5CTOtLrBPJrfYXqbN+bdQk/BI0lkCGVteybiANqbjDO76AaoBBON/GI+Whii3Xrrflo4ROOy/EYG5M/B5eURqTZxcqc56uQ9QSoTBE5JdYi5d5r5KRxXAMiS6oOmaeu4qvY6ckGqbYBpt113VYRhfGruAew1EUacAXzxjJoXITHAdgB2mJ9lgAPPGAhmo19deLq8hQlbRjZ82TjxjFwlkPlhEFgh1T7APlmNwC7PkIayhqxCe5esiUBFWcqrVmsVy6mFbIsV9ZcsVsXi8B/kEqNsiNXbEsySc1IIPFM888yFTgqRo1PpYB9Cp5gog2u+YqYbgOba2N+3x1DFw65o5+i2oXWFOF7/5rNLoZutyiJo+s1q6Bad8Odhi2YhJkI3diOYh5OlkKoReh0qObH/vI077smoDh3eoaw8Zte8yBFdVlTzEa9ejfn4cepcV0Qt6oV9ff6VOGte8OoXZfX415xoA3JCovxU/C8Hgi4euqMif6W8/BLkpyeak2KZZXHMSvEszsWI5hal6xjNRWhyo1IHpuohUX1K6kxtICfOQ29lByqNef4u50vV+UZFuuGGbjGM/1HJZQP/uCS4K40NckSS0FCmOIDKXUlskSNORi86DSJHDGpwUJICJFUMpFI7Rcg/S1a3EapKBvCfGFBaFoCyLEfquAoyio3FM5hWOJ4vXiUGYkHa4L40TzBtWLSK0DUTxwI6RzRT7UKl27PJesICWZNpK+NV3LiSGSMmjICagaQUr1JUUmFoySKYmBb0ZSATU4c6mKYFum2kNdwFDYc68+smlEeiVEWeq7Imc8q8bRmYOkUpgnX10WKkSuXBGYqN7lY0fgLbkfwDy1OPzEwxOWYAAAAASUVORK5CYII="
                 alt=""></li><li onclick="window.location.href='<?php echo url('rot_order/index'); ?>'" data-v-8755e8fe="" class="t"><img data-v-8755e8fe=""
                 src="/static_new6/img/ding.png"
                 alt=""><img data-v-8755e8fe=""
                 src="/static_new6/img/ding.png"
                 alt=""></li><li onclick="window.location.href='<?php echo url('support/index'); ?>'" data-v-8755e8fe="" class=""><img data-v-8755e8fe=""
                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACkAAABLCAMAAADagl6VAAAAk1BMVEUAAAAiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiK59ov2AAAAMHRSTlMAgL9A8OCfYPqwMB8P0JBQCJcE2F0kb1j1dEc858N5NBkS3c3HtolrS4Uo66dk5CucfgS6AAACqElEQVRIx+2UyWLiMBBEW6t3G28krAlrgCQz9f9fNx2beCGAOc4h7yDLUrmkbrVFfV6KdLF2XXct0+KFbjKaSHSRkxFdIxsbQO+Wh9NqtTodJp4GzDijHxwiYOu8UsurswU2B7pgAqydS4OsyIEJ9UgBG17bOk+kF8IxXeezJxXAJ91iCohO/0i3KYApVYR/sKN7HDGvY4jxHNBdNoiJKV2O5j4KblCFY0Y0wAJLzphh6yGmmI+4gU9DZHMOf491RoNY7GmHlIZ5wo5yjnyYGXKa44mGCfD8oPLVdenPg8pHPf/y6jneHorIkERMwyRYUIqIhknZrwBKOlMG/TBOTTfnaML3tvjle7eqRmbRXC3QIZGFyZrd5Iqa2RyH9tgttz5QNLNrbD7LVbgqiy3yl+aE3LrePJiwvZo2gKtd6G0neR/w6qy6+KCWUj0tk1nQ+zndsrlp7mW/1G25eUBCtzi9w2vzIYHilmMEOaJWugX22dVi11j0JkIPWMzokiAGvJD6LF0enI56C+813CX9wN8BiJZJkNV2bxKA518vQvsM4Dnn4PxUc8/Obv8Ebx8bF/HMAyDHK7rPGBpwU0WD7IH8GNADHGWS0S+//G8Ihx4klt0+Q0qcoTOOrDConzEPSSksSOh6orEQhj+LxBkpv5SCFCsrSf1oeg785u1S6TVK5bDwG6GcdnXJevSuTBZaxSSRrq15b1HtyaNB56LTjoM4JBWZL2G7urmI3Zc+N8Z4X+qeUhtdJYVa1NhqaEjhKL+jlMrwi/UaSwMY64SUxBIM76t6spK0olA3h2eFsOKbRKlulqzkPVALH8YZLYi6ygCiseyfgqyVRn1nXsCjO8oAwVnpR7rviYZKaaNAeJq4GGBDAdlqRaTORJXSSXzpJexpkyo5ltt/oUxCYBAbVl0AAAAASUVORK5CYII="
                 alt=""><img data-v-8755e8fe=""
                 src="data:image/png;base64,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"
                 alt=""></li><li onclick="window.location.href='<?php echo url('my/index'); ?>'" data-v-8755e8fe="" class=""><img data-v-8755e8fe=""
                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAABLCAMAAAAvfNUlAAAAnFBMVEUAAAAiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiLK7LdxAAAAM3RSTlMAv0CA7yAvcWCP3xDPUMWgZM0q9q6ThHZpUyUJBQP72KeKS+Tbu7ZZRDoM1EfmsZg3axZmR03kAAACpUlEQVRIx3yT67KCMAyEUw+CgGILggoKKt7wrvv+73bEgbGF4vdvZ7Zpk25IZnmJPCdwvPVmQV0Mzqg5W3qLuwe29siM/c1aAKyv8ZgODJ7U6pDDOLbrbCFiSfcZrq+maY9z47E7iCUpjBD4pPIywEkhQ7sdjvwk6weCUqssc/RkbWFFbULYshxjqhsu9nJhhoPGdME5kUweNlqTk0hygpnGNIcnyzVsjWmKlXom05h2an03QNHy+ICahPBz/abqcWE9yu9sDs81EBHxgIX8OBsPHbMccNqM1AjlA9zIE0IwviQ6ADNNKwiTcmanz4Xrt6Q2TyC3TCqJeQboU/5gALzb6uYBEMfOdZkEKElvnH4RF7zw6SfmaDANLT4vOpezHw1Rk91NneUUBQDE2LbtsYc39/Z2FhmwffrVNfGBAcagGZ0UxixREieAP9UD7OTq9dAjSfdSTHShk78v2WJHOiKk8Te8uUtaGPbfBM675o96je5g1EVYPeR0/bj1+FU8j7gm1Mm/+Iw5YLkLN+CE5EgFRGGBtdDgg5RfHHgUaRirgG1lkcSjSIiFi2EUjAIaAVZAHeWSa0EIAlEQ/NvpSe+E/e/tFRjznNyTdEOKEtGBcr/YT4RaTjE90lmfZFR40ma8UbJKGzXT0WuGaS4tu5HlaISwKZlYEJNNmqwZCg9l5kIeIgHHlPwfmQBLyd6dUEIYLACSA8kIWOJBO6GGfjoY2GKnHVO1tqdPZ7tQXcJ3OhXZY9ymJaH8z0TVnsvEnZX4o6JvrGXgNdYcJoxnZtwbySq65rUd0dQVV1NY2pJ9g+65TdDiGNdMNd7pnm8TuE2ZbS2vtZ+m/NpIxSoV807OMXXFr4lonat6au834tAApsJdPuvu5BgpaKoPoUZAMk0GWP0H/dVEDdUu+BUAAAAASUVORK5CYII="
                 alt=""><img data-v-8755e8fe=""
                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAABLCAMAAAABOfS3AAABvFBMVEUAAAAiIiIiIiIiIiL65k8iIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiL65lEiIiIiIiIiIiIiIiIiIiIiIiIiIiL75k8iIiL7508iIiIiIiIiIiIiIiIiIiL870j6504iIiL65U776EwiIiL7504iIiL76E7850376FD751EiIiL85U4iIiL87E/76lEiIiIiIiIiIiL88UQiIiL54VD65k7650/6504iIiIiIiL86kj65k7750786ksiIiL76kv86U375kz86UwiIiL87EgiIiL+5U8iIiL851Dv3E3651AvLSVfWi6RhzkrKiQlJSMiIiL65Fv650/65k9yazH54lEiIiL760X040z76U385z0iIiL96U386E385E7+71j96E0iIiL75k765k8iIiL55FD65lD65E+YjTq9rkJaVS09Oyf3407z4E3fzUncy0jXxkjTw0euoT+pnD6lmT2hljyFfDZ8dDVeWS5LRyr55FXBskOLgTiAdzV2bjNsZTFiXC9STixEQSk4NiYvLiUnJyMlJSLh0ErLu0XFtkS0pkCOhDlVUC0TOk0qAAAAanRSTlMAv0CA8vDOcTAgEN+PYFCvn9ZTSwn++ebahGQE7NzGrqiTi3c7Cvn06se7taONfXFuaWRZTT84LCkNDf337NDDt6CGd3VsamZHKCYlHhsWA/Lh2tHMzMrIxryopp6amZWDd2JXUzYwKycSa4u+hAAAA+lJREFUSMeMlGdTGlEUhhdHFxWUAEoTCwj2JJYoqDFqLIklmknvmZTJJPe9LCCKGCJijDoaTf3DYdlddu9SzPPpnpn3gTl7z7kcg909beo2tfntLdz/0GCFgtV4cbx+BnCZG2s/hu1+HjCsXpAPmeD1NCnViBPeqsq/7wK/rKlXDXCuVRJmYNU12ge+QuuNcIQ5lrUavC0vWKH/LMHhBzi929q+OF4qP4buCY7hao+QOMUvQsjUYAnBiA6mXu+nAiEZfMsJAm0vFgbQydRPKMmxgz0iQp8WCQaMaMtXlIjEcLIpGZd1+ZY22DXlh30iCxuiILKkMywY0lT9gpT6jb9UFp7pBD/MavGJyERxJJ+EriAr2GBVi2uKEMcXojCqm6RuBNQrkDMpYEvJ00WOxYfH4v7kv9V8JBH9mQsd44gUmNMPaw3cHOdxGHyequeH2Y2U2MH5D1W4VTx9GMp57mmevxdPU/HWNB2QyCinpxPw5fdnItgVIYldIKPmm68HuSIWAKexVjzNbqdPgChR2Z8tObIGAG2WDstDANmvRAO9U+bZsDggcn6cJkx+nivL8pgnEOLaI4zwomy8trHB6DN6bIHXXWq8+kqZdJ2bh4L1fqog3Cwdb3I7APADZrP50iPROVTmYqp3sMReB1yAayHUIu1zcicOfP9MFHqK9trmgHdIeveWevMdx7LAH/XmelfYPNBXJw83lddncxc40Nz1bU2+CoVXY5iSAlFmnIR3ar8m9MnH98wFHOAsqQrqEvnhrJdOK5OEIY49TTUpD0gYsMlqK2FJAjG1ojek1EsY5PycQHRkmL8gw/n5dyqP0nhzRC9s42xLU1av5z+Rt0kS3tAigfxTR3YVcrJ1B2c1HaiLAkWzMEAtsEBG84UCrCBOzc3CBFXZHSj8dAYGiWxeiAY9bBqasotQ+MCkLscKDVTdPCwayrtRNSCX4yY5WQRBjgdyEtQmqAO9MnKSZcELZBMYRsEoGAwA0Ei57UoIg1CUXULvrf4n//9+KMYZZxyTsx4sCSwpmFiY3szpR8q/CsPkDplBKaPSQds9pYnuiKq0nooJNUo+GmjxBnbcyYXA/n+qVCFWktEEQKZ1ePDFKYT19IgNDUH3I6ArgZkbPOFpDiaQoQGNFl/CACANhkYsxikkHcfk4deVvGKliV4dMvtVH4XInn3PQEnng4AOIWyUZfd3wlh1kHITApqqog/imCVWF85Zq0Rf95UMHpGPr+X1V4Gmr+BhhqSbPXu5CMajUKAxrrrxL6Hs2kLWRFlXh8UpdKFPBrOkGtMKdd+aL9IwIaPzpv1L6AC/ZJG59kAGF6owEn3wB+NawfnLkcTLAAAAAElFTkSuQmCC"
                 alt=""></li></ul></div><!-- <script type="text/javascript" src="https://app.wsada.cn/ft.js"></script> --></div></div><script>
    $('.pagination li').click(function () {
        var class2= $(this).attr('class');
        if( class2 == 'active' || class2 == 'disabled' ) {

        }else{
            var url = $(this).find('a').attr('href');
            window.location.href = url;
        }
    })
    $(function () {
        $('.pagination-container select').attr('disabled','disabled');
        $('.pagination-container select').attr('readonly','readonly');

        // 主题
        new rolldate.Date({
            el:'#start',
            format:'YYYY-MM-DD',
            beginYear:2000,
            endYear:2100,
            theme:'blue'
        })


        // 主题
        new rolldate.Date({
            el:'#end',
            format:'YYYY-MM-DD',
            beginYear:2000,
            endYear:2100,
            theme:'blue'
        })
    })
</script></body></html>