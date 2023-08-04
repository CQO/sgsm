<?php /*a:2:{s:71:"/www/wwwroot/ee.00008i.com/application/admin/view/help/edit_banner.html";i:1636019666;s:59:"/www/wwwroot/ee.00008i.com/application/admin/view/main.html";i:1636019666;}*/ ?>
<div class="layui-card layui-bg-gray"><style>        .layui-tab-card>.layui-tab-title .layui-this {
            background-color: #fff;
        }
    </style><!--<div class="layui-tab layui-tab-card" lay-allowClose="true" lay-filter="test1">--><!--<ul class="layui-tab-title">--><!--<li lay-id="/admin/users/index" class="layui-this">网站设置</li>--><!--<li lay-id="/admin/deal/order_list">用户基本管理</li>--><!--<li lay-id="222">权限分配</li>--><!--<li lay-id="222">全部历史商品管理文字长一点试试</li>--><!--<li lay-id="222">全部历史商品管理文字长一点试试</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--</ul>--><!--</div>--><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><!--<form onsubmit="return false;" id="GoodsForm" data-auto="true" method="post" class='layui-form layui-card' autocomplete="off">--><!--<div class="layui-card-body think-box-shadow padding-left-40">--><!--<div class="layui-form-item">--><!--<span class="color-green label-required-prev">轮播展示图片</span>--><!--<table class="layui-table">--><!--<thead>--><!--<tr>--><!--<th class="text-left">展示图片</th>--><!--</tr>--><!--<tr>--><!--<td width="auto" class="text-left"><input name="image" type="hidden" value="<?php echo htmlentities((isset($info['image']) && ($info['image'] !== '')?$info['image']:'')); ?>"></td>--><!--</tr>--><!--</thead>--><!--</table>--><!--<script> $('[name="image"]').uploadMultipleImage()</script>--><!--</div>--><!--<div class="layui-form-item text-center">--><!--<button class="layui-btn" type="submit">保存图片</button>--><!--<button class="layui-btn layui-btn-danger" ng-click="hsitoryBack()" type="button">取消编辑</button>--><!--</div>--><!--</div>--><!--</form>--><form onsubmit="return false;" id="GoodsForm" data-auto="true" method="post" class='layui-form layui-card' autocomplete="off"><div class="layui-card-body think-box-shadow padding-left-40"><div class="layui-form-item layui-row layui-col-space15"><label class="layui-col-xs9 relative"><span class="color-green">跳转链接</span><input name="url" required class="layui-input" placeholder="请输入跳转链接" value="<?php echo htmlentities($info['url']); ?>"><input type="hidden" name="id" value="<?php echo htmlentities($info['id']); ?>"><input type="hidden" name="_csrf_" value="<?php echo systoken('admin/help/edit_banner'); ?>"></label></div><div class="layui-form-item block"><span class="label-required-prev color-green">图片</span><p width="auto" class="text-left"><input name="image" type="hidden" value="<?php echo htmlentities((isset($info['image']) && ($info['image'] !== '')?$info['image']:'')); ?>"></p><script> $('[name="image"]').uploadMultipleImage()</script><p> 图片只能保存一张,更换请先删除</p></div><div class="layui-form-item text-center"><button class="layui-btn" type="submit">提交</button><button class="layui-btn layui-btn-danger" ng-click="hsitoryBack()" type="button">取消</button></div></div></form></div></div><script>//    layui.use('element', function(){
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