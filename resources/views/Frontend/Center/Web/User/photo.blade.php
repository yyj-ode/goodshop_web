
@extends('Frontend.Center.Web.Layout.base')

@section('seo')
    @include('Frontend.Center.Web.Layout.seo')
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('assets/frontend/center/myinfo.css')}}">
@stop

@section('content')

    <div id="main">
        <div class="mod-main">
            {{ Form::open(array('url' => '', 'method' => 'POST','class'=>'layui-form')) }}
            <div class="mt">
                <ul class="extra-l">
                    <li class="fore-1"><a href="{{url('center/user/edit')}}">基本信息</a></li>
                    <li class="fore-2"><a class="curr" href="{{url('center/user/photo')}}">头像照片</a></li>
                    <li class="fore-3"><a href="{{url('')}}">更多个人信息</a></li>
                </ul>
            </div>
            <div class="mc update-face-cont">
                <div class="update-lcol">
                    <div class="mb10">
                        <input type="file" name="file" class="layui-upload-file">
                        <input id="btnCancel" type="hidden" clstag="pageclick|keycount|201602251|5">
                        <div class="ftx03">仅支持JPG、GIF、PNG、JPEG、BMP格式，文件小于4M</div>
                    </div>
                    <div class="img-b-cont img-cont ">
                        <div class="img-b">
                            <img id="bigImage" name="bigImage" alt="" width="150" height="150" src="@if(isset($result->images->url)){{$result->images->url}}@endif">
                        </div>
                    </div>
                    <div class="smt"><h3>推荐头像</h3></div>
                    <div class="smc face-list">
                        <ul class="imgUl" clstag="homepage|keycount|home2013|infoshowtx2">
                            @foreach($image as $key=>$item)
                            <li><img data-id="{{$item->id}}" src="{{$item->url}}" width="50" height="50"><b></b></li>
                            @endforeach
                        </ul>
                        <div class="btns mt20">
                            <button class="layui-btn" lay-submit="submit" lay-filter="submit">保存头像</button>
                        </div>
                    </div>
                </div>
                <div class="update-rcol">
                    <div class="smt"><h3>效果预览</h3></div>
                    <div class="smc">
                        你上传的图片会自动生成2种尺寸，请注意小尺寸的头像是否清晰
                        <div class="img-m-cont img-cont">
                            <div class="img-s">
                                <img id="midImage" name="midImage" style="width: 100px;" src="@if(isset($result->images->url)){{$result->images->url}}@endif">
                            </div>
                        </div>
                        100*100像素
                        <div class="img-s-cont img-cont">
                            <div class="img-s">
                                <img id="smaImage" name="smaImage" style="width: 50px;" src="@if(isset($result->images->url)){{$result->images->url}}@endif">
                            </div>
                        </div>
                        50*50像素
                    </div>
                </div>
                <div class="clr"></div>
                <input type="hidden" name="image_id" id="image_id" value="{{$result->images_id}}">
            </div>
            {!! csrf_field() !!}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        layui.use(['form', 'layedit', 'laydate','upload'], function() {
            var form = layui.form(),
                    layer = layui.layer,
                    layedit = layui.layedit,
                    laydate = layui.laydate;
            layui.upload({
                elem:'.layui-upload-file',
                url: "{{ url('center/uploads/headscreenshot') }}",
                ext: 'jpg|png|gif|jpeg',
                before: function (input) {
                    console.log(input);
                    console.log('文件上传中');
                },
                success: function (json) {
                    $('#image_id').val(json.data.fileId);
                    $('#bigImage').attr('src',json.data.url);
                    $('#midImage').attr('src',json.data.url);
                    $('#smaImage').attr('src',json.data.url);
                    console.log(json); //上传成功返回值，必须为json格式
                }
            });

            $(".imgUl li img").on('click',function () {
                $('#image_id').val($(this).attr('data-id'));
                $('#bigImage').attr('src',$(this).attr('src'));
                $('#midImage').attr('src',$(this).attr('src'));
                $('#smaImage').attr('src',$(this).attr('src'));
            });

            //监听提交
            form.on('submit(submit)', function(data) {
                loadShow();
                $.ajax({
                    url: "{{url('center/user/photo')}}",
                    type: 'post',
                    data:  {
                        image_id:data.field.image_id,
                    },
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success:function(result){
                        if(result.status == true){
                            layer.open({
                                type: 1,
                                title: false, //不显示标题栏
                                closeBtn: false,
                                area: '300px;',
                                shade: 0.8,
                                id: 'LAY_layuipro', //设定一个id，防止重复弹出
                                btn: ['关闭窗口'],
                                moveType: 1, //拖拽模式，0或者1
                                content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;text-align: center">提交成功！ ^_^<br></div>',
                                success: function(layero){
                                    var btn = layero.find('.layui-layer-btn');
                                    btn.css('text-align', 'center');
                                    btn.find('.layui-layer-btn0').attr({
                                        href: '{{url('center/user/photo')}}',
                                        target: '_self'
                                    });
                                    layer.close(index); //如果设定了yes回调，需进行手工关闭
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