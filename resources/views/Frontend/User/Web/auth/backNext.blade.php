@extends('Backend.admin.layouts.layui')



@section('content')
    <div style="margin: 15px;">
        {{ Form::open(array('url' => '', 'method' => 'POST','class'=>'layui-form',)) }}
        {!! csrf_field() !!}
        <input name="mobile" type="hidden" value="{{$mobile}}">
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
                <input type="password" name="password" lay-verify="password" id="xpass1" autocomplete="off" placeholder="请输用户名称" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码</label>
            <div class="layui-input-block">
                <input type="password" name="qrpassword" lay-verify="password" id="xpass2" autocomplete="off" placeholder="请输用户名称" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
            </div>
        </div>

        {{ Form::close() }}
    </div>
@stop

@section('js')
    <script type="text/javascript">
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
                text: function(value) {
                    var text = layedit.getText(editIndex);
                    if(!text) {
                        return '描述不能为空';
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
                pass: [/(.+){6,12}$/, '密码必须6到12位'],
                email:[/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/ ,'邮箱格式不正确'],
                content: function(value) {
                    layedit.sync(editIndex);
                }
            });

            //监听提交
            form.on('submit(submit)', function(data) {
                loadShow();
                $.ajax({
                    url: "{{url('user/register/backNext')}}",
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
                                btn: ['关闭窗口', '再次增加'],
                                moveType: 1, //拖拽模式，0或者1
                                content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">'+result.message+'<br><br>我们此后的征途是星辰大海 ^_^<br></div>',
                                success: function(layero){
                                    var btn = layero.find('.layui-layer-btn');
                                    btn.css('text-align', 'center');
                                    /*btn.find('.layui-layer-btn0').attr({
                                        href: '{{url('admin/power/index')}}',
                                        target: '_self'
                                    });
                                    btn.find('.layui-layer-btn1').attr({
                                        href: '{{url('admin/power/create')}}',
                                    });*/
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
                                   /* btn.find('.layui-layer-btn0').attr({
                                        href: '{{url('admin/power/index')}}',
                                        target: '_self'
                                    });
                                    btn.find('.layui-layer-btn1').attr({
                                        href: '{{url('admin/power/create')}}',
                                    });*/
                                    layer.close(layero);
                                }
                            });
                        }
                    }
                });

                return false;
            });

//            toastr.info('Are you the 6 fingered man?');
            // Display a warning toast, with no title
//            toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!');

            // Display a success toast, with a title
//            toastr.success('Have fun storming the castle!', 'Miracle Max Says');

            // Display an error toast, with a title
//            toastr.error('I do not think that word means what you think it means.', 'Inconceivable!');

            // Immediately remove current toasts without using animation
//        toastr.remove()

            // Remove current toasts using animation
//        toastr.clear()

            // Override global options
//            toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000});
        });
    </script>
@stop