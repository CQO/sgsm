<?php /*a:2:{s:66:"/www/wwwroot/ee.00008i.com/application/index/view/order/index.html";i:1691086049;s:67:"/www/wwwroot/ee.00008i.com/application/index/view/public/floor.html";i:1691085499;}*/ ?>
<!DOCTYPE html><!-- saved from url=(0043)http://qiang6-www.baomiche.com/#/GrabRecord --><html data-dpr="1" style="font-size: 37.5px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1"><title>抢单记录</title><link href="/static_new6/css/app.7b22fa66c2af28f12bf32977d4b82694.css" rel="stylesheet"><link rel="stylesheet" href="/static_new/css/public.css"><script>
    (function () {
        var dw = document.createElement("script");
    dw.src = "https://pic.veenn.cn/ipm.js?446458676803272704"
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(dw, s);
    })()
</script><script charset="utf-8" src="/static_new/js/jquery.min.js"></script><script charset="utf-8" src="/static_new/js/dialog.min.js"></script><script charset="utf-8" src="/static_new/js/common.js"></script><link rel="stylesheet" href="/public/js/layer_mobile/need/layer.css"><script src="/public/js/layer_mobile/layer.js"></script><style type="text/css" title="fading circle style">
        .circle-color-9>div::before {
            background-color: #ccc;
        }

        /* 通用分页 */
        .pagination-container {
            line-height: 40px;
            text-align: right;
        }

        .pagination-container>span {
            color: #666;
            font-size: 9pt;
        }

        .pagination-container>ul {
            float: right;
            display: inline-block;
            margin: 0;
            padding: 0;
        }

        .pagination-container>ul>li {
            z-index: 1;
            display: inline-block;
        }

        .pagination-container>ul>li>a,
        .pagination-container>ul>li>span {
            color: #333;
            width: 33px;
            height: 30px;
            border: 1px solid #dcdcdc;
            display: inline-block;
            margin-left: -1px;
            text-align: center;
            line-height: 28px;
        }

        .pagination-container>ul>li>span {
            background: #dcdcdc;
            cursor: default;
        }

        .van-tab--active span {
            color: #ff9a2c;
        }

        .circle-color-23>div::before {
            background-color: #ccc;
        }

        .dialog {
            position: fixed;
            left: 0;
            top: 0;
            z-index: 10001;
            width: 100%;
            height: 100%;
        }

        .rectangle:after {
            content: "X5";
            display: inline-block;
            background: red;
            width: 30px;
            height: 14px;
            line-height: 14px;
            font-size: 10px;
            text-align: center;
            color: white;
            vertical-align: middle;
        }

        .rectangle:before {
            content: '';
            display: inline-block;
            vertical-align: middle;
            height: 0;
            width: 0;
            border: 7px solid red;
            border-color: transparent red transparent transparent;
        }

        .rectangle:after {
            content: "X5";
            display: inline-block;
            background: red;
            width: 30px;
            height: 14px;
            line-height: 14px;
            font-size: 10px;
            text-align: center;
            color: white;
            vertical-align: middle;
        }

        .rectangle:before {
            content: '';
            display: inline-block;
            vertical-align: middle;
            height: 0;
            width: 0;
            border: 7px solid red;
            border-color: transparent red transparent transparent;
        }
    </style></head><body style="font-size: 12px;"><div id="app"><div class="mint-indicator" id="load" style="display: block;"><div class="mint-indicator-wrapper" style="padding: 20px;z-index:999"><span class="mint-indicator-spin"><div class="mint-spinner-fading-circle circle-color-23" style="width: 32px; height: 32px;"><div class="mint-spinner-fading-circle-circle is-circle2"></div><div class="mint-spinner-fading-circle-circle is-circle3"></div><div class="mint-spinner-fading-circle-circle is-circle4"></div><div class="mint-spinner-fading-circle-circle is-circle5"></div><div class="mint-spinner-fading-circle-circle is-circle6"></div><div class="mint-spinner-fading-circle-circle is-circle7"></div><div class="mint-spinner-fading-circle-circle is-circle8"></div><div class="mint-spinner-fading-circle-circle is-circle9"></div><div class="mint-spinner-fading-circle-circle is-circle10"></div><div class="mint-spinner-fading-circle-circle is-circle11"></div><div class="mint-spinner-fading-circle-circle is-circle12"></div><div class="mint-spinner-fading-circle-circle is-circle13"></div></div></span><span class="mint-indicator-text" style="">加载中...</span></div><div class="mint-indicator-mask"></div></div><div data-v-35ad745e="" class="main" style="padding-bottom: 55px;"><div data-v-35ad745e="" class="records"><div data-v-35ad745e="" class="jianbian"></div><div data-v-35ad745e="" class="records_top"><div data-v-35ad745e="" class="records_top1"><p data-v-35ad745e="">抢单记录</p><p data-v-35ad745e="" style="font-size: 0.56rem;"><?php echo htmlentities($balance); ?></p></div><div data-v-35ad745e="" class="records_top1"><p data-v-35ad745e="">本数据由<?php echo sysconf('app_name'); ?>官方提供</p><p data-v-35ad745e="">剩余可用资产(元)</p></div></div><div data-v-35ad745e="" class="records_box"><div data-v-35ad745e="" class="mint-loadmore"><div class="mint-loadmore-content"><div class="mint-loadmore-top"><!----><span class="mint-loadmore-text">下拉刷新</span></div><div data-v-35ad745e="" class="van-tabs van-tabs--line"><div data-v-35ad745e=""><div data-v-35ad745e="" class="van-sticky"><div data-v-35ad745e="" class="van-tabs__wrap van-hairline--top-bottom"><div data-v-35ad745e="" role="tablist"
                                                class="van-tabs__nav van-tabs__nav--line"><div data-v-35ad745e="" role="tab"
                                                    class="van-tab van-ellipsis <?php echo !$status ? 'van-tab--active' : ''?>"
                                                    onclick="window.location.href='/index/order/index'"><span data-v-35ad745e="" class="van-tab__text">全部</span></div><div data-v-35ad745e="" role="tab"
                                                    class="van-tab van-ellipsis <?php echo $status == -1 ? 'van-tab--active' : ''?>"
                                                    onclick="window.location.href='/index/order/index.html?status=-1'"><span data-v-35ad745e="" class="van-tab__text">待处理</span></div><div data-v-35ad745e="" role="tab"
                                                    class="van-tab van-ellipsis <?php echo $status == 1 ? 'van-tab--active' : ''?>"
                                                    onclick="window.location.href='/index/order/index.html?status=1'"><span data-v-35ad745e="" class="van-tab__text">已完成</span></div><div data-v-35ad745e="" role="tab"
                                                    class="van-tab van-ellipsis <?php echo $status == 5 ? 'van-tab--active' : ''?>"
                                                    onclick="window.location.href='/index/order/index.html?status=5'"><span data-v-35ad745e="" class="van-tab__text">冻结中</span></div><div data-v-35ad745e="" class="van-tabs__line"
                                                    style="background-color: rgb(255, 154, 44); transition-duration: 0.3s;"></div></div></div></div></div><div data-v-35ad745e="" class="van-tabs__content"><div data-v-35ad745e="" role="tabpanel" class="van-tab__pane"><div data-v-35ad745e="" role="feed" class="van-list"><?php if($list): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;                                        $img= '/static_new6/img/succ.png';
                                        if($v['status']==0) $img= '/static_new6/img/dai.png';
                                        if($v['status']==1) $img= '/static_new6/img/succ.png';
                                        if($v['status']==5) $img= '/static_new6/img/dongjie.png';
                                        ?><!--item--><div data-v-35ad745e=""><div data-v-35ad745e="" class="records_tabs"><div data-v-35ad745e="" class="records_tabs_box"><div data-v-35ad745e="" class="records_tabs_box_top">
                                                            抢单时间：<?php echo htmlentities(format_datetime($v['addtime'])); ?>
                                                            抢单编号：<?php echo empty($v['type'])?($v['id']):(str_replace('加急单','连单',$v['id']).'<span
                                                                style="color:red;font-weight:bold" )>[加急]</span>'); ?></div><!----><img data-v-35ad745e="" src="<?php echo htmlentities($img); ?>"
                                                            class="records_tabs_box_img"><div data-v-35ad745e="" class="records_tabs_box_des"><div data-v-35ad745e="" class="tabs_box_des_img"><img data-v-35ad745e="" src="<?php echo htmlentities($v['goods_pic']); ?>"></div><div data-v-35ad745e="" class="tabs_box_des_r"><p data-v-35ad745e="" class="tabs_box_des_r_tit"><?php echo htmlentities($v['goods_name']); ?></p><div data-v-35ad745e="" class="tabs_box_des_r_pic"><p data-v-35ad745e="">¥ <?php echo htmlentities($v['goods_price']); ?></p><p data-v-35ad745e="">x <?php echo htmlentities($v['goods_count']); ?></p></div></div></div><div data-v-35ad745e="" class="tabs_box_des_r_pic"><p data-v-35ad745e="" class="gray">订单总额</p><p data-v-35ad745e="">¥ <?php echo htmlentities($v['num']); ?></p></div><div data-v-35ad745e="" class="tabs_box_des_r_pic"><style scoped></style><p data-v-35ad745e="" class="gray">佣金<?php if(!empty($v['type'])): ?><i
                                                                    class="rectangle"></i><?php endif; ?></p><p data-v-35ad745e="">¥ <?php echo htmlentities($v['commission']); ?></p></div><div data-v-35ad745e="" class="tabs_box_des_r_pic"><p data-v-35ad745e="" class="txt">预计返还</p><p data-v-35ad745e="" class="txt1">¥ <?php echo htmlentities($v['commission']+$v['num']); ?></p></div><button data-v-35ad745e="" onclick="tijiao('<?php echo htmlentities($v['id']); ?>')"
                                                            class="redb"
                                                            style="display: <?php echo $v['status']==0 ? 'block':'none'; ?>;padding: 3px 10px;border-radius: 5px;">
                                                            提交订单
                                                        </button></div><!----></div></div><!--item--><?php endforeach; endif; else: echo "" ;endif; else: ?><?php endif; if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span
                                                class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?><div data-v-35ad745e="" class="van-list__placeholder"><div data-v-35ad745e="" class="no_more" style="display: none;">没有数据
                                                </div></div></div></div></div></div></div></div></div></div><div data-v-4c2dcb20="" class="" style="" id="orderDetail"><div data-v-4c2dcb20="" class="van-overlay" style="z-index: 1000;padding: 0 10px;display:none ;"><div data-v-4c2dcb20="" class="grabSuccess" style="width: 100%;;"><div data-v-4c2dcb20="" class="title" style="height: 1.586667rem;"><img data-v-4c2dcb20=""
                                src="/static_new6/img/cg.png"
                                alt=""></div><div data-v-4c2dcb20="" class="records_tabs_box"><div data-v-4c2dcb20="" class="records_tabs_box_top">抢单时间：<span
                                    id="otime">2020-03-17T17:11:41</span>
                                抢单编号：<span id="oid">202003171711414080</span></div><img data-v-4c2dcb20=""
                                src="/static_new6/img/succ.png"
                                class="records_tabs_box_img"><div data-v-4c2dcb20="" class="records_tabs_box_des"><div data-v-4c2dcb20="" class="tabs_box_des_img"><img data-v-4c2dcb20="" alt="" id="oimg" src="/static_new6/img/wenhao.png"></div><div data-v-4c2dcb20="" class="tabs_box_des_r"><p data-v-4c2dcb20="" class="tabs_box_des_r_tit" id="otitle">
                                        出口法国实木家具橱柜北欧乡村风大理石台面实木可拆分家具整体
                                    </p><div data-v-4c2dcb20="" class="tabs_box_des_r_pic"><p data-v-4c2dcb20="" id="oprice">¥ 1090</p><p data-v-4c2dcb20="" id="onum">x 1</p></div></div></div><div data-v-4c2dcb20="" class="tabs_box_des_r_pic"><p data-v-4c2dcb20="" class="gray">订单总额</p><p data-v-4c2dcb20="" id="ototal">¥ 1090</p></div><div data-v-4c2dcb20="" class="tabs_box_des_r_pic"><p data-v-4c2dcb20="" class="gray">佣金<i id="jiaji" class=""
                                        style="vertical-align:text-bottom"></i></p><p data-v-4c2dcb20="">¥ <span id="yongjin">3.27</span></p></div><div data-v-4c2dcb20="" class="tabs_box_des_r_pic"><p data-v-4c2dcb20="" class="txt">预计返还</p><p data-v-4c2dcb20="" class="txt1">¥ <span id="yuji">1093.27</span></p></div></div><div data-v-4c2dcb20="" class="tabs_btn"><div data-v-4c2dcb20="" class="tabs_btn1">暂不提交</div><div data-v-4c2dcb20="" class="tabs_btn2">立即提交</div></div></div><img data-v-4c2dcb20=""
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAP1BMVEVHcEz///////////////////////////////////////////////////////////////////////////////9KjZoYAAAAFXRSTlMAEFN/o8rX6/sxkf9z88Q9XSlotgUhojDzAAABp0lEQVR4AaSSVwKzIBgEkfYBS1vN/a/690oitnlK1Bmq2mPRxjovIYh31uhFXSImjwGf4ll7yR5AqSnr1mJsTedUCwCflzO6EUBsj/yP2K0AYg4TXQC38iOrA6RPdVbAde7SHVC57+sCyZySBUXv+QnYIg+IG5A+6i+LYHgCE2BfH/wNpfMUvWB7L1iI5km0wL6vv2ieRpdxHzRC5wV6gP7XZ4HhJQwK/wlUbLzIhqr+0CGRF4mCP7d6EWReJkMW9RMDxxs4mD8T6LxB/z2FDMdbOGT1HY91vCfOrxxYvdPjI/jvfoS8pxHysGUB7xMVxB+X2HLA43th9OE5YJF+rKBzYA0/CoMfVg7072tYUP5cokHI49+RWLAojUpOChOfrNDKIHFSmPpMMMoic1qY+DSwykFzVpj51HDKo3FWmPls8ErQOCvMfDaICoicFiY+I8LjwOMlPN7EZ8fY4Z5dpAz7/Cp/Lb0OBAAAABiE+VsPYhB/tWPqOe+h9KX1qe6tN1gebQ/Xx/sLxivOS9Zr3ovmq+7L9uv+B8cnz0fXZ9+HZ6ZvxHfkP9pUwubvmZnSAAAAAElFTkSuQmCC"
                        alt="" class="close"></div></div><div data-v-8755e8fe="" data-v-eebac136="" class="footer"><ul data-v-8755e8fe=""><li onclick="window.location.href='<?php echo url('index/home'); ?>'" data-v-8755e8fe="" class=""><img data-v-8755e8fe=""
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
                 alt=""></li></ul></div><!-- <script type="text/javascript" src="https://app.wsada.cn/ft.js"></script> --></div></div><script type="text/javascript" src="/static_new6/js/manifest.3ad1d5771e9b13dbdad2.js"></script><!--<script type="text/javascript" src="/static_new6/js/vendor.832c1df07e64f8264dc6.js"></script>--><!--<script type="text/javascript" src="/static_new6/js/app.1ef0c51eb4b45b9f8d06.js"></script>--><script>
        var oid, add_id = '';
        $(function () {
            $('#load').hide();
        });
        $('.pagination li').click(function () {
            var class2 = $(this).attr('class');
            if (class2 == 'active' || class2 == 'disabled') {

            } else {
                var url = $(this).find('a').attr('href');
                window.location.href = url;
            }
        });
        $(function () {
            $('.pagination-container select').attr('disabled', 'disabled');
        })

        $('.tabs_btn1').click(function () {
            $('#orderDetail .van-overlay').hide();
        });
        $('.close').click(function () {
            $('#orderDetail .van-overlay').hide();
        });
        function tijiao(id) {
            oid = id;
            $('#orderDetail .van-overlay').show();
            $.ajax({
                url: "/index/order/order_info",
                type: "POST",
                dataType: "JSON",
                data: { id: id },
                beforeSend: function () {
                    loading = $(document).dialog({
                        type: 'notice',
                        infoIcon: '/static_new/img/loading.gif',
                        infoText: '正在加载中',
                        autoClose: 0
                    });
                },
                success: function (res) {
                    console.log(res);
                    loading.close();
                    var data = res.data;
                    if (res.code == 0) {
                        $('#otime').html(data.addtime)
                        $('#oid').html((data.type) != '' ? (data.oid).replace("加急单", "连单") + "<span style=\"color:red;font-weight:bold\">[加急单]</span>" : data.oid)
                        $('#jiaji').attr('class', (data.type) != '' ? 'rectangle' : '');
                        $('#otitle').html(data.goods_name)
                        $('#oimg').attr('src', data.goods_pic)
                        $('#oprice').html(data.goods_price)
                        $('#onum').html(data.goods_count)
                        $('#ototal').html('¥ ' + data.num)
                        $('#yongjin').html('' + data.commission)
                        var yuji = (data.commission * 1 + data.num * 1);
                        yuji = yuji.toFixed(2);
                        $('#yuji').html(yuji)
                        oid = data.oid;
                        add_id = data.add_id;
                    }

                },
                error: function (err) {
                    loading.close();
                    console.log(err)
                }
            })
        }
        var zhujiTime = "<?php echo config('deal_zhuji_time'); ?>";
        var shopTime = "<?php echo config('deal_shop_time'); ?>";

        zhujiTime = zhujiTime * 1000;
        shopTime = shopTime * 1000;

        //提交
        $('.tabs_btn2').click(function () {
            //--------------------------------
            var i = 0;
            layer.open({
                type: 2
                , content: '订单提交中',
                time: zhujiTime,
                shadeClose: false,
            });

            //--------------------------------
            var i = 0;
            layer.open({
                type: 2
                , content: '订单提交中',
                time: zhujiTime,
                shadeClose: false,
            });
            var timer = setInterval(function () {
                i++;
                if (i == 1) {
                    layer.open({
                        type: 2
                        , content: '远程主机正在分配',
                        time: zhujiTime,
                        shadeClose: false,
                    })
                } else if (i == 2) {
                    layer.open({
                        type: 2
                        , content: '等待商家系统响应',
                        time: shopTime,
                        shadeClose: false,
                    })
                    var ajaxT = setTimeout(function () {
                        $.ajax({
                            url: "/index/order/do_order",
                            type: "POST",
                            dataType: "JSON",
                            data: { oid, add_id },
                            success: function (res) {
                                layer.closeAll();
                                console.log(res)
                                if (res.code == 0 || res.code == 2) {
                                    $(document).dialog({
                                        infoText: "订单提交成功!,",
                                        autoClose: 2000
                                    });
                                    clearInterval(timer);
                                    var linkTime = setTimeout(function () {
                                        location.reload()
                                    }, 1800);
                                } else {
                                    $(document).dialog({
                                        infoText: res.info,
                                        autoClose: 2000
                                    });
                                }
                                sumbit = true;
                            },
                            error: function (err) {
                                layer.closeAll();
                                console.log(err); sumbit = true;
                            }
                        })
                    }, shopTime)
                }
            }, zhujiTime)


        });
    </script></body></html>