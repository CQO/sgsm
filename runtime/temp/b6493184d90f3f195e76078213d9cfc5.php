<?php /*a:3:{s:74:"/www/wwwroot/ee.00008i.com/application/admin/view/deal/pre_order_list.html";i:1636019666;s:59:"/www/wwwroot/ee.00008i.com/application/admin/view/main.html";i:1636019666;s:81:"/www/wwwroot/ee.00008i.com/application/admin/view/deal/pre_order_list_search.html";i:1636019666;}*/ ?>
<div class="layui-card layui-bg-gray"><style>        .layui-tab-card>.layui-tab-title .layui-this {
            background-color: #fff;
        }
    </style><!--<div class="layui-tab layui-tab-card" lay-allowClose="true" lay-filter="test1">--><!--<ul class="layui-tab-title">--><!--<li lay-id="/admin/users/index" class="layui-this">网站设置</li>--><!--<li lay-id="/admin/deal/order_list">用户基本管理</li>--><!--<li lay-id="222">权限分配</li>--><!--<li lay-id="222">全部历史商品管理文字长一点试试</li>--><!--<li lay-id="222">全部历史商品管理文字长一点试试</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--</ul>--><!--</div>--><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="layui-card"><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span>预派送列表
        <div class="pull-right"><a data-open="<?php echo url('add_order'); ?>" class="layui-btn">派送</a><a data-open="<?php echo url('pre_add_order'); ?>" class="layui-btn">预派送</a></div></div></div><div class="think-box-shadow"><fieldset><legend>条件搜索</legend><form class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get" autocomplete="off"><div class="layui-form-item layui-inline"><label class="layui-form-label">用户ID</label><div class="layui-input-inline"><input name="oid" value="<?php echo htmlentities((app('request')->get('uid') ?: '')); ?>" placeholder="请输入用户ID" class="layui-input"></div></div><!--<div class="layui-form-item layui-inline"><label class="layui-form-label">用户名称</label><div class="layui-input-inline"><input name="username" value="<?php echo htmlentities((app('request')->get('username') ?: '')); ?>" placeholder="请输入用户名称" class="layui-input"></div></div>--><div class="layui-form-item layui-inline"><label class="layui-form-label">用户账号</label><div class="layui-input-inline"><input name="tel" value="<?php echo htmlentities((app('request')->get('tel') ?: '')); ?>" placeholder="请输入手机号码" class="layui-input"></div></div><!--<div class="layui-form-item layui-inline"><label class="layui-form-label">添加时间</label><div class="layui-input-inline"><input data-date-range name="addtime" value="<?php echo htmlentities((app('request')->get('addtime') ?: '')); ?>" placeholder="请选择添加时间" class="layui-input"></div></div>--><div class="layui-form-item layui-inline"><button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button></div></form></fieldset><script>form.render()</script><table class="layui-table margin-top-15" lay-skin="line"><thead><tr><th class='text-left nowrap'>用户ID</th><th class='text-left nowrap'>用户账号</th><th class='text-left nowrap'>今日已完成单数</th><th class='text-left nowrap'>触发数量</th><th class='text-left nowrap'>商品ID:数量</th><th class='text-left nowrap'>总额</th><th class='text-left nowrap'>添加时间</th><th class='text-left nowrap'>状态</th><th class='text-left nowrap'>操作</th></tr></thead><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='text-left nowrap'><?php echo htmlentities($vo['uid']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['tel']); ?></td><td class='text-left nowrap'><?php echo isset($conveyNum[$vo['uid']]) ? htmlentities($conveyNum[$vo['uid']]) : 0; ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['order_num']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['goods_id']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['total']); ?></td><td class='text-left nowrap'><?php echo htmlentities(format_datetime($vo['created_at'])); ?></td><td class='text-left nowrap'><?php echo !empty($vo['status']) ? '已处理' : '未处理'; ?></td><td class='text-left nowrap'><?php if($vo['status']==0): ?><a class="layui-btn layui-btn-xs layui-btn" onClick="pre_order_del(<?php echo htmlentities($vo['id']); ?>)" style='background:green;'>删除</a><?php endif; ?></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div><script>
    function pre_order_del(id){
         layer.confirm("确认要删除吗，删除后不能恢复",{ title: "删除确认" },function(index){
            $.ajax({
                type: 'POST',
                url: "<?php echo url('pre_order_del'); ?>",
                data: {
                    'id': id,
                    '_csrf_': "<?php echo systoken('admin/deal/pre_order_del'); ?>"
                },
                success:function (res) {
                    layer.msg(res.info,{time:2500});
                    location.reload();
                }
            });
        },function(){});
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