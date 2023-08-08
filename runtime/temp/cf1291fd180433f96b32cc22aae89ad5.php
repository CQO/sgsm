<?php /*a:2:{s:70:"/www/wwwroot/ee.00008i.com/application/admin/view/deal/order_list.html";i:1691498588;s:59:"/www/wwwroot/ee.00008i.com/application/admin/view/main.html";i:1636019666;}*/ ?>
<div class="layui-card layui-bg-gray"><style>        .layui-tab-card>.layui-tab-title .layui-this {
            background-color: #fff;
        }
    </style><!--<div class="layui-tab layui-tab-card" lay-allowClose="true" lay-filter="test1">--><!--<ul class="layui-tab-title">--><!--<li lay-id="/admin/users/index" class="layui-this">网站设置</li>--><!--<li lay-id="/admin/deal/order_list">用户基本管理</li>--><!--<li lay-id="222">权限分配</li>--><!--<li lay-id="222">全部历史商品管理文字长一点试试</li>--><!--<li lay-id="222">全部历史商品管理文字长一点试试</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--</ul>--><!--</div>--><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><style type="text/css">
    .badge {
        padding: 1px;
        border-radius: 50%;
        background-color: red;
        width: 1.2rem;
        height: 1.2rem;
        line-height: 1.2rem;
        color: #fff;
        display: inline-block;
        text-align: center;
    }
</style><div class="think-box-shadow"><fieldset><legend>条件搜索</legend><form class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get" autocomplete="off"><div class="layui-form-item layui-inline"><label class="layui-form-label">订单号</label><div class="layui-input-inline"><input name="oid" value="<?php echo htmlentities((app('request')->get('oid') ?: '')); ?>" placeholder="请输入订单号" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">用户名称</label><div class="layui-input-inline"><input name="username" value="<?php echo htmlentities((app('request')->get('username') ?: '')); ?>" placeholder="请输入用户名称" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">下单时间</label><div class="layui-input-inline"><input data-date-range name="addtime" value="<?php echo htmlentities((app('request')->get('addtime') ?: '')); ?>" placeholder="请选择添加时间" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">订单状态</label><div class="layui-input-inline"><select name="status" id="selectList"><option value="-1">所有状态</option><?php foreach($cate as $key=>$vo): ?><option value="<?php echo htmlentities($key); ?>" ><?php echo htmlentities($vo); ?></option><?php endforeach; ?></select></div></div><div class="layui-form-item layui-inline"><button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button></div></form></fieldset><script>form.render()</script><table class="layui-table margin-top-15" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='text-left nowrap'>订单号 -- 当日第N单</th><th class='text-left nowrap'>用户名</th><th class='text-left nowrap'>当前余额</th><th class='text-left nowrap'>商品名称</th><th class='text-left nowrap'>商品单价</th><th class='text-left nowrap'>交易数量</th><th class='text-left nowrap'>交易数额</th><th class='text-left nowrap'>佣金</th><th class='text-left nowrap'>下单时间</th><th class='text-left nowrap'>解冻时间</th><th class='text-left nowrap'>交易状态</th><th class='text-left nowrap'>操作</th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='text-left nowrap'><?php echo htmlentities($vo['id']); if($vo['day_order_idx']): ?> -- <span class="badge"><?php echo htmlentities($vo['day_order_idx']); ?><?php endif; ?></span></td><td class='text-left nowrap'><?php echo htmlentities($vo['username']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['balance']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['goods_name']); ?></td><td class='text-left nowrap'>¥<?php echo htmlentities($vo['goods_price']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['goods_count']); ?></td><td class='text-left nowrap'>¥<?php echo htmlentities($vo['num']); ?></td><td class='text-left nowrap'>¥<?php echo htmlentities($vo['commission']); ?></td><td class='text-left nowrap'><?php echo htmlentities(format_datetime($vo['addtime'])); ?></td><td class='text-left nowrap'><?php echo htmlentities(format_datetime($vo['endtime'])); ?></td><td class='text-left nowrap'><?php switch($vo['status']): case "0": ?><!-- {if auth("edit_recharge")}
                                <a data-csrf="{:systoken('admin/deal/edit_recharge')}" class="layui-btn layui-btn-xs layui-btn" data-action="{:url('edit_recharge',['status'=>2,'id'=>$vo.id])}" data-value="id#{$vo.id};status#2" >确认付款</a><a data-csrf="{:systoken('admin/deal/edit_recharge')}" class="layui-btn layui-btn-xs layui-btn-warm" data-action="{:url('edit_recharge',['status'=>3,'id'=>$vo.id])}" data-value="id#{$vo.id};status#3" >取消订单</a>
                            {/if} -->
                            等待付款
                        
                    <?php break; case "1": ?>完成付款<?php break; case "2": ?>用户取消<?php break; case "3": ?>强制付款<?php break; case "4": ?>系统取消<?php break; case "5": ?>订单冻结<?php break; case "6": ?>待派送<?php break; ?><?php endswitch; ?></td><td class='text-left nowrap'><?php if($vo['status']==0): ?><button class='layui-btn layui-btn-sm layui-btn-primary' onclick="op_search('<?php echo htmlentities($vo['id']); ?>')">替换</button><a data-csrf="<?php echo systoken('admin/deal/do_user_order'); ?>" class="layui-btn layui-btn-xs layui-btn" data-action="<?php echo url('do_user_order'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;status#3" >强制付款</a><a data-csrf="<?php echo systoken('admin/deal/do_user_order'); ?>" class="layui-btn layui-btn-xs layui-btn-warm" data-action="<?php echo url('do_user_order'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;status#4" >取消订单</a><?php endif; if($vo['status']==5): ?><a data-csrf="<?php echo systoken('admin/deal/jiedong'); ?>" class="layui-btn layui-btn-xs layui-btn" data-action="<?php echo url('jiedong'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;status#3" >手动解冻</a><?php endif; if($vo['status']==6): ?><button class='layui-btn layui-btn-sm layui-btn-primary' onclick="op_search('<?php echo htmlentities($vo['id']); ?>')">替换</button><?php endif; ?></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div><script>
        var test = "<?php echo htmlentities(app('request')->get('status')); ?>";
        if (test=="") {
            test=-1;
        }
        $("#selectList").find("option[value="+test+"]").prop("selected",true);

        form.render()
        var order_id=0;
        function op_search(oid) {
            order_id=oid;
            $.form.iframe('<?php echo url("admin/shop/task_goods_fitter"); ?>', '替换');
        }

        function op_replace(goods_id, num) {
            /*alert(order_id)
            alert(goods_id)
            alert(num)*/
            
            // order_id=0;
            $.ajax({
                type: 'POST',
                url: "<?php echo url('order_edit'); ?>",
                data: {
                    'order_id': order_id,
                    'goods_id': goods_id,
                    'num': num,
                },
                success:function (res) {
                    layer.msg(res.info,{
                        time:2500
                    }, function(){
                        if (res.code==1) {
                            layer.closeAll()
                            $.form.reload();
                        }
                    });
                   
                }
            });
        }
    </script></div></div><script>//    layui.use('element', function(){
//        var element = layui.element;
//
//        element.tabAdd('demo', {
//            title: '选项卡的标题'
//            ,content: '选项卡的内容' //支持传入html
//            ,id: '选项卡标题的lay-id属性值'
//        });
//
//        //获取hash来切换选项卡，假设当前地址的hash为lay-id对应的值
//        var layid = location.hash.replace(/^#test1=/, '');
//        element.tabChange('test1', layid); //假设当前地址为：http://a.com#test1=222，那么选项卡会自动切换到“发送消息”这一项
//
//        //监听Tab切换，以改变地址hash值
//        element.on('tab(test1)', function(){
//            location.hash = ''+ this.getAttribute('lay-id');
//        });
//    });

</script>