<?php /*a:1:{s:67:"/www/wwwroot/ee.00008i.com/application/index/view/ctrl/deposit.html";i:1691592536;}*/ ?>
<!DOCTYPE html><html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover"><title>提现</title><link rel="stylesheet" href="/static_new/css/public.css"><link rel="stylesheet" href="/static_new/css/icon-font.css"><script src="/static_new/js/pack.js"></script><script charset="utf-8" src="/static_new/js/jquery.min.js"></script><script charset="utf-8" src="/static_new/js/dialog.min.js"></script><style>
        body {
            background-color:  #f2f2f2;;
            margin-bottom: 65px;
        }

        .header {
            width: 100%;
            color: #464646!important;
            position: fixed;
            top: 0;
            z-index: 99;
            position: relative;
            background: #fff;
        }

        .header > p {
            width: 96%;
            margin: 0 2%;
            height: 46px;
            line-height: 46px;
            text-align: center;
        }

        .my-meun {
            overflow: hidden;
            margin-right: 15px;
            margin-left: 15px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .my-meun > .meun-item {
            font-size: 15px;
            padding-right: 45px;
            position: relative;
            padding: 0 15px;
            height: 50px;
            background-color: #fff;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .my-meun > .meun-item > .item-line {
            border-bottom: 1px solid rgba(0, 0, 0, .2)
        }

        .my-meun > .meun-item > .item-line > span {
            font-size: 15px;
            line-height: 50px;
            margin-left: 5px;
            color: #8799a3;
        }

        .my-meun > .meun-item > .item-line > icon {
            color: #000;
            position: absolute;
            right: 15px;
            top: 17px;
        }

        .item-line > input {
            border: none;
            position: absolute;
            right: 15px;
            top: 14px;
            margin-top: 2px;
            text-align: right;
            font-size: 15px;
        }

        .item-line > input:-moz-placeholder {
            color: grey;
            font-size: 14px;
            text-align: right;
        }

        .item-line > input::-moz-placeholder {
            color: grey;
            font-size: 14px;
            text-align: right;
        }

        .item-line > input:-ms-input-placeholder, textarea:-ms-input-placeholder {
            color: grey;
            font-size: 14px;
            text-align: right;
        }

        .item-line > input::-webkit-input-placeholder, textarea::-webkit-input-placeholder {
            color: grey;
            font-size: 14px;
            text-align: right;
        }

        .save-btn {
            margin: 20px 15px;
            padding: 10px;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            font-size: 14px;
            background: #2f3848!important;
        }

        .money-bg {
            margin-right: 15px;
            margin-left: 15px;
            border-radius: 10px;
            margin-top: 10px;
            background-color: #fff;
            position: relative;
        }

        .money-bg > p {
            padding: 10px;
        }

        .money-bg > input {
            font-size: 28px;
            border: none;
            width: 70%;
            margin: 10px 10px 20px 50px;
        }

        .money-bg > span {
            position: absolute;
            left: 20px;
            bottom: 55px;
            font-size: 22px;
        }

        .balance {
            color: #999;
            font-size: 12px;
        }

        .rate {
            border: 1px solid #fbbd08;
            font-size: 12px;
            padding: 1px 6px;
            border-radius: 2500px;
            color: #fbbd08;
            margin-left: 5px;
        }

        .right {
            float: right;
        }
    </style><link rel="stylesheet" href="/static_new/css/theme.css"><script>
        (function () {
            var dw = document.createElement("script");
            dw.src = "/static_new/js/pack.js?e9154e78c011e7e0eba17228a1621937"
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(dw, s);
        })()
    </script><script type="application/javascript">
        window.onpageshow = function (event) {
            if (event.persisted) {
                window.location.reload();
            }
        };
    </script></head><body id="app"><div class="header" style="background: #fff;"><div class="goback" style="color: #464646!important"><span class="icon iconfont icon-fanhui"></span><a href="javascript:history.go(-1)" style="color: #464646!important">返回</a></div><p>提现</p></div><form id="login-form"><div class="money-bg"><p>提现金额<span class="rate">提现费率 <?php echo htmlentities($shouxu*100); ?>%</span></p><span>￥</span><input name="num" id="num" type="number" placeholder="输入提现金额"><p class="balance">余额：¥ <?php echo htmlentities($user['balance']); ?><a href="javascript:void(0)" onclick="return tixianAll(<?php echo htmlentities($user['balance']); ?>)" style="margin-left:20px">全部提现</a></p></div><div class="my-meun"><div class="meun-item"><div class="item-line"><span>手机号</span><input type="text" value="<?php echo htmlentities($user['tel']); ?>" placeholder="输入手机号" name="mobile" autocomplete="off"></div></div><div class="meun-item"><div class="item-line"><span>银行卡号</span><input type="text" value="<?php echo htmlentities((isset($info['cardnum']) && ($info['cardnum'] !== '')?$info['cardnum']:'')); ?>" name="bank_account" autocomplete="off" readonly=""></div></div><div class="meun-item"><div class="item-line"><span>所属银行</span><input type="text"  value="<?php echo htmlentities((isset($info['bankname']) && ($info['bankname'] !== '')?$info['bankname']:'')); ?>" name="back_address" autocomplete="off" readonly=""></div></div><div class="meun-item"><div class="item-line"><span>开户名</span><input type="text" value="<?php echo htmlentities((isset($info['username']) && ($info['username'] !== '')?$info['username']:'')); ?>" name="back_name" autocomplete="off" readonly=""></div></div><div class="meun-item"><div class="item-line"><span>资金密码</span><input type="password" placeholder="输入资金密码" name="paypassword" autocomplete="off"></div></div></div><div class="money-bg"><p style="font-size: 11px">* <br>
            请仔细核对收款信息<br>
        本次提现扣除手续费 <?php echo htmlentities($shouxu*100); ?>%
        </p></div><input type="hidden" name="type" value="card"></form><div class="save-btn">立刻提现</div><script type="application/javascript">
    function tixianAll(price)
    {
        $('#num').val(price);
    }

    $(function () {
        if ($("input[name=bank_account]").val() == '****') {
            loading = $(document).dialog({
                type: 'notice',
                infoIcon: '/static_new/img/loading.gif',
                infoText: '跳转中....',
                autoClose: 0
            });
            $(document).dialog({infoText: '未绑定银行卡,前往绑定!'});
            setTimeout(function () {
                window.location.href = '/index/my/bind_bank';
            }, 2000);
        }




        /*检查表单*/
        function check() {
            if ($("input[name=num]").val() == '') {
                $(document).dialog({infoText: '输入提现金额'});
                return false;
            }
            if ($("input[name=mobile]").val() == '') {
                $(document).dialog({infoText: '输入手机号'});
                return false;
            }
            if ($("input[name=bank_account]").val() == '') {
                $(document).dialog({infoText: '输入银行卡号'});
                return false;
            }
            if ($("input[name=back_name]").val() == '') {
                $(document).dialog({infoText: '输入开户名'});
                return false;
            }
            if ($("input[name=paypassword]").val() == '') {
                $(document).dialog({infoText: '输入资金密码'});
                return false;
            }
            return true;
        }

        /*点击登录*/
        $(".save-btn").on('click', function () {
            if (check()) {
                var loading = null;
                $.ajax({
                    url: '/index/ctrl/do_deposit',
                    data: $("#login-form").serialize(),
                    type: 'POST',
                    beforeSend: function () {
                        loading = $(document).dialog({
                            type: 'notice',
                            infoIcon: '/static_new/img/loading.gif',
                            infoText: '正在加载中',
                            autoClose: 0
                        });
                    },
                    success: function (data) {
                        loading.close();
                        if (data.code == 0) {
                            $(document).dialog({infoText: '提交成功,请耐心等待审核!'});
                            setTimeout(function () {
                                window.location.href = '/index/my/index';
                            }, 2000);
                        } else {
                            $(document).dialog({infoText: data.info});
                        }
                    }
                });
            }
        })
    })


</script></body></html>