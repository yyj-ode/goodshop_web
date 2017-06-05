@extends('Backend.admin.layouts.layui')
@section('content')
    <div style="margin: 15px;">
        {{ Form::open(array('url' => 'center/add_action', 'method' => 'POST','class'=>'layui-form','empty'=>"multipart/form-data")) }}
        {!! csrf_field() !!}
        {{-- <div class="layui-form-item">
             <label class="layui-form-label">身份证号</label>
             <div class="layui-input-block">
                 <input type="text" name="card" id="text" lay-verify="required"  autocomplete="off" placeholder="请输年龄" class="layui-input" value="">
             </div>
         </div>
         <div class="layui-form-item">
             <label class="layui-form-label">证件有效期</label>
             <div class="layui-input-block">
                 <input type="text" name="time" id="text" lay-verify="required"  autocomplete="off" placeholder="请输年龄" class="layui-input" value="">
             </div>
         </div>
         <div class="layui-form-item">
             <label class="layui-form-label">身份</label>
             <div class="layui-input-block">
                 <input type="text" name="roles" id="text" lay-verify="required"  autocomplete="off" placeholder="请输年龄" class="layui-input" value="">
             </div>
         </div>
         <div class="layui-form-item">
             <label class="layui-form-label" id="brandCode">商业类型</label>
             <div class="layui-input-block">
                 <input type="text" name="type" lay-verify="required" id="mobileData" autocomplete="off" placeholder="请输商业类型" class="layui-input" value="">
             </div>
         </div>--}}
        <div class="layui-form-item">
            <label class="layui-form-label" id="brandCode">上传文件</label>
            <div class="layui-input-block">
                <input type="file" name="file">
            </div>
        </div>
        {{--<div class="layui-inline" style="width: 210px;">
            <input type="text" name="code" lay-verify="required"  autocomplete="off" placeholder="请输用户名称" class="layui-input" value="">
            <a  style="width: 210px;"  id="brandCode">获取验证码</a>
        </div>--}}
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@stop
@section('js')
    {{--<script type="text/javascript">
        layui.use(['form', 'layedit', 'laydate'], function() {
            var form = layui.form(),
                layer = layui.layer,
                layedit = layui.layedit,
                laydate = layui.laydate;
            //创建一个编辑器
            var editIndex = layedit.build('LAY_demo_editor');
            //自定义验证规则
            form.verify({
                title: function(value) {
                    if(value.length < 1) {
                        return '用户名至少得1个字符啊';
                    }
                },
                password: function(value) {
                    var pass1=$('#xpass1').val();
                    var pass2=$('#xpass2').val();
                    if( pass1.length<6 || pass1.length>12){
                        return '新密码必须6到12位';
                    }
                    if( pass2.length<6 || pass2.length>12){
                        return '新密码必须6到12位';
                    }
                    if( !(pass1 == pass2)){
                        return '两次输入新密码不一致';
                    }
                },
                text: function(value) {
                    var text = layedit.getText(editIndex);
                    if(!text) {
                        return '描述不能为空';
                    }
                },
                tel:[/^1[34578]\d{9}$/,'手机格式不正确'],
                pass: [/(.+){6,12}$/, '密码必须6到12位'],
                email:[/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/ ,'邮箱格式不正确'],
                content: function(value) {
                    layedit.sync(editIndex);
                }
            });
            $("#brandCode").on('click',function () {
                var mobileData = $("#mobileData").val();
                $.ajax({
                    url: "{{url("user/register/captcha")}}",
                    type: 'post',
                    data: { mobile : mobileData},
                    dataType: 'json',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                    success:function(result){
                        alert(result.message);
                    }
                });
            });
            //监听提交
            form.on('submit(submit)', function(data) {
                var chk_value =[];
                $('input[name="roles"]:checked').each(function(){
                    chk_value.push($(this).val());
                });
                var text = layedit.getText(editIndex);
                data['field']['description'] = text;
                loadShow();
                $.ajax({
                    url: "{{url('center/authentication_sort')}}",
                    type: 'post',
                    data: data.field,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
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
                                btn: ['注册成功', '返回'],
                                moveType: 1, //拖拽模式，0或者1
                                content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">'+result.message+'<br><br>我们此后的征途是星辰大海 ^_^<br></div>',
                                success: function(layero){
                                    var btn = layero.find('.layui-layer-btn');
                                    btn.css('text-align', 'center');
                                    layer.close(layero);
                                }
                            });
                        }else{
                            layer.open({
                                type: 1,
                                title: false, //不显示标题栏
                                closeBtn: false,
                                area: '300px;',
                                shade: 0.8,
                                id: 'LAY_layuipro', //设定一个id，防止重复弹出
                                btn: ['关闭窗口', '再次增加'],
                                moveType: 1, //拖拽模式，0或者1
                                content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">'+result.message+'<br></div>',
                                success: function(layero){
                                    var btn = layero.find('.layui-layer-btn');
                                    btn.css('text-align', 'center');
                                    layer.close(layero);
                                }
                            });
                        }
                    }
                });
                return false;
            });
        });
    </script>--}}
@stop