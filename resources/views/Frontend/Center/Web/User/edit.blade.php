
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
            <div class="mt">
                <ul class="extra-l">
                    <li class="fore-1"><a class="curr" href="{{url('center/user/edit')}}">基本信息</a></li>
                    <li class="fore-2"><a href="{{url('center/user/photo')}}">头像照片</a></li>
                    <li class="fore-3"><a href="//i.jd.com/user/userinfo/more.html">更多个人信息</a></li>
                </ul>
            </div>
            <div class="mc">
                <div class="user-set userset-lcol">
                    {{ Form::open(array('url' => '', 'method' => 'POST','class'=>'layui-form')) }}
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户ID：</label>
                        <div class="layui-input-block ">
                            <input type="text" value="{{$result->id}}" name="id" class="layui-input layui-disabled" style="width: 200px;">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">会员名：</label>
                        <div class="layui-input-block">
                            <input type="text" value="{{$result->username}}" name="username"  placeholder="请输入会员名" class="layui-input layui-disabled" style="width: 200px;">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">真实姓名：</label>
                        <div class="layui-input-block">
                            <input type="text" value="{{$result->really_name}}" name="really_name" placeholder="请输入真实姓名" class="layui-input" style="width: 200px;">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">性别：</label>
                        <div class="layui-input-block">
                            <input type="radio" name="sex" value="1" title="男" @if(isset($result->sex) && !empty($result->sex) && ($result->sex == "1")) checked="checked" @endif><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>男</span></div>
                            <input type="radio" name="sex" value="0" title="女" @if(isset($result->sex) && empty($result->sex)) checked="checked" @endif><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>女</span></div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">昵称：</label>
                        <div class="layui-input-block">
                            <input type="text" value="{{$result->nickname}}" name="nickname" placeholder="请输入昵称" class="layui-input" style="width: 200px;">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">联系地址</label>
                        <div class="layui-input-inline" style="width: 178px;">
                            <select name="province" class="select" lay-filter="province">
                                <option value="">请选择</option>
                                @foreach($area as $key=>$value)
                                    @if(isset($result->province) && !empty($result->province) && ($value->id == $result->province))
                                        <option value="{{$value->id}}" selected="selected">{{$value->name}}</option>
                                    @else
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="layui-input-inline" style="display: none;width: 178px;" id="city_input">
                            <select name="city"  class="select" lay-filter="city" id="city">
                                <option value="">请选择</option>
                            </select>
                        </div>
                        <div class="layui-input-inline" style="display: none;width: 178px;" id="county_input">
                            <select name="county" class="select" lay-filter="county" id="county">
                                <option value="">请选择</option>
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="text" value="@if(isset($result->address)){{$result->address}}@endif" name="address" placeholder="请输入联系地址" class="layui-input" style="width: 554px;">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">手机号码：</label>
                        <div class="layui-input-block">
                            <input type="text" value="@if(isset($result->mobile)){{$result->mobile}}@endif" name="mobile" placeholder="请输入手机号码" class="layui-disabled layui-input" style="width: 200px;">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">邮箱：</label>
                        <div class="layui-input-block">
                            <input type="text" value="{{$result->email}}" name="email" placeholder="请输入邮箱" class="layui-input" style="width: 200px;">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">邮编：</label>
                        <div class="layui-input-block">
                            <input type="text" value="{{$result->post_code}}" name="post_code" placeholder="请输入邮编" class="layui-input" style="width: 200px;">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="submit" lay-filter="submit">立即提交</button>
                        </div>
                    </div>
                    {!! csrf_field() !!}
                    {{ Form::close() }}
                </div>
                <div id="user-info">
                    <div class="u-pic">
                        <img alt="用户头像" src="@if(isset($result->images->url)){{$result->images->url}}@endif">
                        <div class="mask"></div>
                        <div class="face-link-box"></div>
                        <a href="//i.jd.com/user/userinfo/showImg.html" class="face-link">修改头像</a>
                    </div>
                    <div class="info-m">
                        <div><b>用户名：{{$result->username}}</b></div>
                        <div class="u-level">
                            <span class="rank r4">
                                <s></s><a clstag="homepage|keycount|home2013|infoMember" href="{{url('')}}" target="_blank">金牌会员</a>
                            </span>
                        </div>
                        <div clstag="pageclick|keycount|201602251|4">小白信用：<a href="{{url('')}}" target="_blank">95.1 分</a></div>
                        <div>会员类型：个人用户</div>
                    </div>
                </div>
                <div class="fr ac" style="width:280px;">
                    注：修改手机和邮箱请到<a clstag="homepage|keycount|home2013|infopay" class="ml5 ftx05" href="//safe.jd.com/user/paymentpassword/safetyCenter.action">账户安全</a>
                </div>
                <div class="clr"></div>
            </div>
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

            form.verify({
                title: function(value) {
                    if(value.length < 5) {
                        return '标题至少得5个字符啊';
                    }
                },
            });

            $(document).ready(function() {
                area("@if(isset($result->province)){{$result->province}}@endif",'city_input','city',"@if(isset($result->city)){{$result->city}}@endif");
                area("@if(isset($result->city)){{$result->city}}@endif",'county_input','county',"@if(isset($result->county)){{$result->county}}@endif");
            });

            form.on('select(province)', function (data) {
                var category_id = data.value;
                area(category_id,'city_input','city','');
            });
            form.on('select(city)', function (data) {
                var category_id = data.value;
                area(category_id,'county_input','county','');
            });

            function area(category_id,show_input,option,select_id) {
                if(category_id != ''){
                    var html = '';
                    $.ajax({
                        url: "{{url('center/area/category')}}",
                        type: 'post',
                        data: {id:category_id},
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        success:function(result){
                            $('#'+show_input).show();
                            $("#"+option).html('');
                            $("#"+option).append('<option value="">请选择</option>');
                            $.each( result, function(index, content){
                                if(parseInt(content.id) == parseInt(select_id)){
                                    html+= "<option value='" + content.id +"' selected='selected'>" + content.name +"</option>";
                                }else{
                                    html+= "<option value='" + content.id +"'>" + content.name +"</option>";
                                }
                            });
                            $("#"+option).append(html);
                            form.render('select');
                            toastr.info('请选择下一级!');
                        }
                    });
                }
            }

            //upload
            layui.upload({
                elem:'.layui-upload-file',
                url: "{{ url('center/uploads/headscreenshot') }}",
                ext: 'jpg|png|gif|jpeg',
                before: function (input) {
                    console.log(input);
                    console.log('文件上传中');
                },
                success: function (json) {
                    $('#image_upload').val(json.data.fileId);
                    $('#image_upload_src').html('<img src="' + json.data.url + '" style="width:60px;height:60px;padding:2px;"><button type="button" class="btn btn-close"><i class="fa fa-close"></i></button>');
                    console.log(json); //上传成功返回值，必须为json格式
                }
            });

            //监听提交
            form.on('submit(submit)', function(data) {
                loadShow();
                $.ajax({
                    url: "{{url('center/user/update')}}",
                    type: 'post',
                    data:  {
                        really_name:data.field.really_name,
                        nickname:data.field.nickname,
                        email:data.field.email,
                        post_code:data.field.post_code,
                        province:data.field.province,
                        sex:data.field.sex,
                        city:data.field.city,
                        county:data.field.county,
                        address:data.field.address,
                    },
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
                                btn: ['关闭窗口'],
                                moveType: 1, //拖拽模式，0或者1
                                content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;text-align: center">提交成功！ ^_^<br></div>',
                                success: function(layero){
                                    var btn = layero.find('.layui-layer-btn');
                                    btn.css('text-align', 'center');
                                    btn.find('.layui-layer-btn0').attr({
                                        href: '{{url('center/user/edit')}}',
                                        target: '_self'
                                    });
                                    layer.close(layero);
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