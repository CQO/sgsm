<?php /*a:2:{s:69:"/www/wwwroot/ee.00008i.com/application/admin/view/deal/add_order.html";i:1636019666;s:59:"/www/wwwroot/ee.00008i.com/application/admin/view/main.html";i:1636019666;}*/ ?>
<div class="layui-card layui-bg-gray"><style>        .layui-tab-card>.layui-tab-title .layui-this {
            background-color: #fff;
        }
    </style><!--<div class="layui-tab layui-tab-card" lay-allowClose="true" lay-filter="test1">--><!--<ul class="layui-tab-title">--><!--<li lay-id="/admin/users/index" class="layui-this">网站设置</li>--><!--<li lay-id="/admin/deal/order_list">用户基本管理</li>--><!--<li lay-id="222">权限分配</li>--><!--<li lay-id="222">全部历史商品管理文字长一点试试</li>--><!--<li lay-id="222">全部历史商品管理文字长一点试试</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--<li lay-id="222">订单管理</li>--><!--</ul>--><!--</div>--><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><form onsubmit="return false;" id="GoodsForm" data-auto="true" method="post" class='layui-form layui-card' autocomplete="off"><div class="layui-card-body think-box-shadow padding-left-40"><div class="layui-form-item layui-row layui-col-space15"><label class="layui-col-xs9 relative"><span class="color-green">产品ID <span><br>格式 1-2-3 </span></span><input name="goods_id_str" required class="layui-input" placeholder="请输入产品ID"><input type="hidden" name="_csrf_" value="<?php echo systoken('admin/deal/add_order'); ?>"></label></div><div class="layui-form-item layui-row layui-col-space15"><label class="layui-col-xs9 relative"><span class="color-green">用户账号</span><input name="tel" required class="layui-input" placeholder="请输入用户账号" value="<?php echo htmlentities($tel); ?>"></label></div><div class="layui-form-item layui-row layui-col-space15"><label class="layui-col-xs9 relative"><span class="color-green">产品数量 <span><br>格式 1-1-1 </span></span><input name="amount_str" required class="layui-input" placeholder="请输入产品数量"></label></div><div class="layui-form-item text-center"><button class="layui-btn" type="submit">保存</button><button class="layui-btn layui-btn-danger" ng-click="hsitoryBack()" type="button">取消编辑</button></div></div></form></div><script>
    window.form.render();
    require(['ckeditor', 'angular'], function () {
        window.createEditor('[name="goods_info"]', {height: 500});
        var app = angular.module("GoodsForm", []).run(callback);
        angular.bootstrap(document.getElementById(app.name), [app.name]);

        function callback($rootScope) {
            $rootScope.isAddMode = parseInt('<?php echo htmlentities((isset($isAddMode) && ($isAddMode !== '')?$isAddMode:0)); ?>');
            $rootScope.maps = JSON.parse(angular.element('#goods-value').val() || '[]') || {};
            $rootScope.specs = JSON.parse(angular.element('#goods-specs').val() || '[{"name":"默认分组","list":[{"name":"默认规格","check":true}]}]');
            // 批量设置数值
            $rootScope.batchSet = function (type, fixed) {
                layer.prompt({title: '请输入数值', formType: 0}, function (value, index) {
                    $rootScope.$apply(function () {
                        var val = (parseFloat(value) || 0).toFixed(fixed);
                        for (var i in $rootScope.specsTreeData) for (var j in $rootScope.specsTreeData[i]) {
                            $rootScope.specsTreeData[i][j][type] = val;
                        }
                    });
                    layer.close(index);
                });
            };
            // 返回商品列表
            $rootScope.hsitoryBack = function () {
                $.msg.confirm('确定要取消编辑吗？', function (index) {
                    history.back(), $.msg.close(index);
                });
            };
            // 设置默认值
            $rootScope.setValue = function (key, type, value, call) {
                $rootScope.maps[key] || ($rootScope.maps[key] = {});
                return $rootScope.maps[key][type] = eval(call.replace('_', "'" + value + "'"));
            };
            // 读取默认值
            $rootScope.getValue = function (key, callback) {
                if (typeof callback === 'function') {
                    return callback($rootScope.maps[key] || {});
                }
                return {};
            };
            // 去除空白字符
            $rootScope.trimSpace = function (value) {
                return (value + '').replace(/\s*/ig, '');
            };
            // 生成交叉表格数据
            $rootScope.specsTreeData = [];
            $rootScope.specsTreeNava = [];
            // 当前商品规格发生变化时重新计算规格列表
            $rootScope.$watch('specs', function () {
                var data = $rootScope.specs, list = [], navs = [], table = [[]];
                // 过滤无效记录
                for (var i in data) {
                    var tmp = [];
                    for (var j in data[i].list) if (data[i].list[j].check && data[i].list[j].name.length > 0) {
                        data[i].list[j].span = 1, data[i].list[j].show = true, data[i].list[j].group = data[i].name;
                        tmp.push(data[i].list[j]);
                    }
                    list.push(tmp), navs.push(data[i].name);
                }
                $rootScope.specsTreeNava = navs;
                // 表格交叉
                for (var i in list) {
                    var tmp = [];
                    for (var j in table) for (var k in list[i]) tmp.push(table[j].concat(list[i][k]));
                    table = tmp;
                }
                // 表格合并
                list = angular.fromJson(angular.toJson(table));
                for (var i in list) {
                    var key = [], _key = '';
                    for (var td in list[i]) key.push(list[i][td].group + '::' + list[i][td].name);
                    for (var td in list[i]) if (_key.length === 0) {
                        list[i][0].key = _key = key.join(';;');
                        list[i][0].sku = $rootScope.getValue(_key, function (data) {
                            return data.sku || '0';
                        });
                        list[i][0].virtual = $rootScope.getValue(_key, function (data) {
                            return data.virtual || '0';
                        });
                        list[i][0].express = $rootScope.getValue(_key, function (data) {
                            return data.express || '1';
                        });
                        list[i][0].market = $rootScope.getValue(_key, function (data) {
                            return data.market || '0.00';
                        });
                        list[i][0].selling = $rootScope.getValue(_key, function (data) {
                            return data.selling || '0.00';
                        });
                        list[i][0].status = $rootScope.getValue(_key, function (data) {
                            return !!(typeof data.status !== 'undefined' ? data.status : true);
                        });
                    }
                }
                $rootScope.specsTreeData = list;
            }, true);
            // 判断规则是否能取消选择
            $rootScope.checkListChecked = function (list, check) {
                for (var i in list) if (list[i].check) return check;
                return true;
            };
            // 增加整行规格分组
            $rootScope.addSpecRow = function (data) {
                data.push({name: '规格分组', list: [{name: '规格属性', check: true}]})
            };
            // 下移整行规格分组
            $rootScope.dnSpecRow = function (data, $index) {
                var tmp = [], cur = data[$index];
                if ($index > data.length - 2) return false;
                for (var i in data) {
                    (parseInt(i) !== parseInt($index)) && tmp.push(data[i]);
                    (parseInt(i) === parseInt($index) + 1) && tmp.push(cur);
                }
                return $rootScope.specs = tmp;
            };
            // 上移整行规格分组
            $rootScope.upSpecRow = function (data, $index) {
                var tmp = [], cur = data[$index];
                if ($index < 1) return false;
                for (var i in data) {
                    (parseInt(i) === parseInt($index) - 1) && tmp.push(cur);
                    (parseInt(i) !== parseInt($index)) && tmp.push(data[i]);
                }
                return $rootScope.specs = tmp;
            };
            // 移除整行规格分组
            $rootScope.delSpecRow = function (data, $index) {
                var tmp = [];
                for (var i in data) if (parseInt(i) !== parseInt($index)) tmp.push(data[i]);
                return $rootScope.specs = tmp;
            };
            // 增加分组的属性
            $rootScope.addSpecVal = function (list) {
                list.push({name: '规格属性', check: true});
            };
            // 移除分组的属性
            $rootScope.delSpecVal = function (data, $index) {
                var temp = [];
                for (var i in data) if (parseInt(i) !== parseInt($index)) temp.push(data[i]);
                return temp;
            };
        }
    })
</script></div><script>//    layui.use('element', function(){
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