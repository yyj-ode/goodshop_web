@extends('Frontend.Center.Web.Layout.base')

@section('seo')
    @include('Frontend.Center.Web.Layout.seo')
@stop

@section('content')

    <div class="layui-tab layui-tab-brief" lay-filter="demoTitle">
        <ul class="layui-tab-title site-demo-title">
            <li class="layui-this">个人信息</li>
        </ul>
        <div class="layui-body layui-tab-content site-demo site-demo-body">
            <div class="layui-tab-item layui-show">
                <div class="layui-main">
                    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                        <legend>个人信息</legend>
                    </fieldset>
                    {{ Form::open(array('url' => 'center/user/persons', 'method' => 'POST','class'=>'layui-form',)) }}
                        {!! csrf_field() !!}
                        <div class="site-demo-upload" style="margin-left: 50px;">
                            <img id="LAY_demo_upload" src="http://ask.iqilong.cc/assets/frontend/index/images/logo.png">
                            <div class="site-demo-upbar">
                                <div class="layui-box layui-upload-button">
                                    <form target="layui-upload-iframe" method="get" key="set-mine" enctype="multipart/form-data" action="/test/upload.json">
                                        <input type="file" name="file" class="layui-upload-file" id="test">
                                    </form>
                                    <span class="layui-upload-icon"><i class="layui-icon"></i>上传图片</span>
                                </div>
                            </div>
                        </div>
                        <p style="margin: 10px 0 10px 50px;color: red;">注：请上传2M以下的jpg、png、gif格式的图片。</p>
                        <div class="layui-form-item">
                            <label class="layui-form-label">用户名</label>
                            <div class="layui-input-inline">
                                <input type="text" name="name" value="yangbin" lay-verify="required" autocomplete="off" class="layui-input" disabled="">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">昵称</label>
                            <div class="layui-input-inline">
                                <input type="text" name="nickname" lay-verify="required" value="yangbin" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">单选框</label>
                            <div class="layui-input-block">
                                <input type="radio" name="sex" value="男" title="男" checked="" style="display: none;">
                                <div class="layui-unselect layui-form-radio layui-form-radioed">
                                    <i class="layui-anim layui-icon"></i><span>男</span>
                                </div>

                                <input type="radio" name="sex" value="女" title="女" style="display: none;">
                                <div class="layui-unselect layui-form-radio">
                                    <i class="layui-anim layui-icon"></i><span>女</span>
                                </div>

                                <input type="radio" name="sex" value="保密" title="保密" style="display: none;">
                                <div class="layui-unselect layui-form-radio">
                                    <i class="layui-anim layui-icon"></i><span>保密</span>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">出生日期</label>
                            <div class="layui-input-inline">
                                <input type="text" name="birth_date" id="date" lay-verify="date" placeholder="yyyy-mm-dd" class="layui-input" onclick="layui.laydate({elem: this})">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">所在城市</label>
                            <div class="layui-input-inline">
                                <select name="quiz1" style="display: none;">
                                    <option value="">请选择省</option>
                                    <option value="浙江" selected="">浙江省</option>
                                    <option value="你的工号">江西省</option>
                                    <option value="你最喜欢的老师">福建省</option>
                                </select>
                                <div class="layui-unselect layui-form-select">
                                    <div class="layui-select-title">
                                        <input type="text" placeholder="请选择省" value="浙江省" readonly="" class="layui-input layui-unselect">
                                        <i class="layui-edge"></i>
                                    </div>
                                    <dl class="layui-anim layui-anim-upbit">
                                        <dd lay-value="浙江" class="layui-this">浙江省</dd>
                                        <dd lay-value="你的工号" class="">江西省</dd>
                                        <dd lay-value="你最喜欢的老师" class="">福建省</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="layui-input-inline">
                                <select name="quiz2" style="display: none;">
                                    <option value="">请选择市</option>
                                    <option value="杭州">杭州</option>
                                    <option value="宁波" disabled="">宁波</option>
                                    <option value="温州">温州</option>
                                    <option value="温州">台州</option>
                                    <option value="温州">绍兴</option>
                                </select>
                                <div class="layui-unselect layui-form-select">
                                    <div class="layui-select-title">
                                        <input type="text" placeholder="请选择市" value="" readonly="" class="layui-input layui-unselect">
                                        <i class="layui-edge"></i>
                                    </div>
                                    <dl class="layui-anim layui-anim-upbit">
                                        <dd lay-value="杭州" class="">杭州</dd>
                                        <dd lay-value="宁波" class=" layui-disabled">宁波</dd>
                                        <dd lay-value="温州" class="">温州</dd>
                                        <dd lay-value="温州" class="">台州</dd>
                                        <dd lay-value="温州" class="">绍兴</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="layui-input-inline">
                                <select name="quiz3" style="display: none;">
                                    <option value="">请选择县/区</option>
                                    <option value="西湖区">西湖区</option>
                                    <option value="余杭区">余杭区</option>
                                    <option value="拱墅区">临安市</option>
                                </select>
                                <div class="layui-unselect layui-form-select">
                                    <div class="layui-select-title">
                                        <input type="text" placeholder="请选择县/区" value="" readonly="" class="layui-input layui-unselect">
                                        <i class="layui-edge"></i>
                                    </div>
                                    <dl class="layui-anim layui-anim-upbit">
                                        <dd lay-value="西湖区" class="">西湖区</dd>
                                        <dd lay-value="余杭区" class="">余杭区</dd>
                                        <dd lay-value="拱墅区" class="">临安市</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">邮箱</label>
                            <div class="layui-input-inline">
                                <input type="text" name="email" lay-verify="required" value="yangbin@163.com" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit="" lay-filter="submit">保存</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@stop

@section('javascript')
    <script>
        layui.use(['form', 'layedit', 'laydate'], function(){
            var form = layui.form()
                    ,layer = layui.layer
                    ,layedit = layui.layedit
                    ,laydate = layui.laydate;

            //创建一个编辑器
            var editIndex = layedit.build('LAY_demo_editor');

            //自定义验证规则
            form.verify({
                title: function(value){
                    if(value.length < 5){
                        return '标题至少得5个字符啊';
                    }
                }
                ,pass: [/(.+){6,12}$/, '密码必须6到12位']
                ,content: function(value){
                    layedit.sync(editIndex);
                }
            });



            //监听提交
            form.on('submit(demo1)', function(data){
                layer.alert(JSON.stringify(data.field), {
                    title: '最终的提交信息'
                })
                return false;
            });


        });
    </script>
@stop