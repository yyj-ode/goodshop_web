@extends('Frontend.Center.Web.Layout.base')

@section('seo')
    @include('Frontend.Center.Web.Layout.seo')
@stop

@section('content')

    <div class="layui-tab layui-tab-brief" lay-filter="demoTitle">
        <ul class="layui-tab-title site-demo-title">
            <li class="layui-this">修改密码</li>
        </ul>
        <div class="layui-body layui-tab-content site-demo site-demo-body">
            <div class="layui-tab-item layui-show">
                <div class="layui-main">
                    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                        <legend>修改密码</legend>
                    </fieldset>
                    {{ Form::open(array('url' => 'center/user/reset', 'method' => 'POST','class'=>'layui-form',)) }}
                        {!! csrf_field() !!}
                        <div class="layui-form-item">
                            <label class="layui-form-label">原密码</label>
                            <div class="layui-input-inline">
                                <input type="password" name="oldpassword" lay-verify="required" autocomplete="off" placeholder="请输入原密码" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">新密码</label>
                            <div class="layui-input-inline">
                                <input type="password" name="password" lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">确认密码</label>
                            <div class="layui-input-inline">
                                <input type="password" name="password_confirmation" lay-verify="required"  placeholder="请输入确认密码" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
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
    <script type="text/javascript">
        layui.use(['form', 'layedit', 'laydate'], function() {
            var $ = layui.jquery,form = layui.form(),
                    layer = layui.layer,
                    layedit = layui.layedit,
                    laydate = layui.laydate;

            //监听提交
            form.on('submit(submit)', function(data) {
                $.ajax({
                    url: "{{url('center/user/reset')}}",
                    type: 'post',
                    data: data.field,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success:function(result){
                        console.log(result.status);
                        if(result.status == true){
                            layer.open({
                                type: 1,
                                title: false, //不显示标题栏
                                closeBtn: false,
                                area: '300px;',
                                shade: 0.8,
                                id: 'LAY_layuipro', //设定一个id，防止重复弹出
                                btn: ['确认', '取消'],
                                moveType: 1, //拖拽模式，0或者1
                                content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">'+result.message+'！<br><br>^_^<br></div>',
                                success: function(layero){
                                    layer.close(); //如果设定了yes回调，需进行手工关闭
//                                    window.location.reload();
                                }
                            });
                        }else {
                            layer.open({
                                type: 1,
                                title: false,
                                closeBtn: false,
                                area: '300px;',
                                shade: 0.8,
                                id: 'LAY_layuipro',
                                btn: ['确认', '取消'],
                                moveType: 1, //拖拽模式，0或者1
                                content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">'+result.message+'！<br><br>^_^<br></div>',
                                success: function(layero){
                                    layer.close();
//                                    window.location.reload();
                                }
                            });
                        }
                    }
                });

                return false;
            });
        });
    </script>
@stop