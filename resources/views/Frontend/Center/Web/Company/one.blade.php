@extends('Frontend.Center.Web.Layout.base')

@section('seo')
    @include('Frontend.Center.Web.Layout.seo')
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('assets/frontend/center/myinfo.css')}}">
@stop

@section('content')
    <div id="main">
        <div class="mod-main mod-comm mod-order" id="order01">
            <div class="mt">
                <h3>公司介绍是网站重要展示信息，为保障信息真实性、合法性、有效性和完整性，建议实名发布！立即验证>></h3>
                <div class="extra-r"></div>
            </div>
        </div>
        <div class="mod-main">
            <div class="mt" style="margin-left: 100px;">
                <div class="layui-form-item">
                    <div class="layui-input-inline" style="width: 165px;">
                        <a class="layui-btn" href="{{url('center/company/one')}}">1.企业基本资料--开通店铺</a>
                    </div>
                    <div class="layui-input-inline" style="width: 45px;">
                        <div class="layui-btn"><i class="layui-icon"></i></div>
                    </div>
                    <div class="layui-input-inline" style="width: 165px;">
                        <a class="layui-btn" href="{{url('center/company/tow')}}">2.企业详细信息--优先展示</a>
                    </div>
                    <div class="layui-input-inline" style="width: 45px;">
                        <div class="layui-btn"><i class="layui-icon"></i></div>
                    </div>
                    <div class="layui-input-inline">
                        <a class="layui-btn" href="{{url('center/company/three')}}">3.企业资质认证--提升信誉</a>
                    </div>
                </div>
            </div>
            <div class="mt">
                <div class="userset-lcol" style="width: 100%;">
                    {{ Form::open(array('url' => '', 'method' => 'POST','class'=>'layui-form')) }}
                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>公司名称：</label>
                        <div class="layui-input-inline">
                            <input type="text" value="@if($company->title){{$company->title}}@endif" name="title" lay-verify="required" placeholder="请输入公司名称" class="layui-input" style="width: 300px;">
                        </div>
                        <div class="layui-input-inline" style="clear: both;width: 400px;margin-left: 110px;">
                            请用中文完整填写在工商局注册的公司全称。
                            地区、字号、经营行业、公司体制，如：北京市XXXX有限公司；
                            个体经营者请按照“经营者姓名”+“个体经营”字样，如：“X X（个体经营）”
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>工商注册号：</label>
                        <div class="layui-input-inline">
                            <input type="text" value="@if($company->company_code){{$company->company_code}}@endif" name="company_code"  placeholder="请输入工商注册号" lay-verify="required" class="layui-input" style="width: 300px;">
                        </div>
                        <div class="layui-input-inline" style="clear: both;width: 400px;margin-left: 110px;">
                            请按照工商营业执照真实填写。
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>企业类型：</label>
                        <div class="layui-input-block" style="width: 200px;">
                            <select name="company_type" lay-verify="required">
                                <option value="">请选择</option>
                                @if(isset($company->company_type))
                                    {!! getSelectedConfig(config('company_type'),$company->company_type) !!}
                                @else
                                    {!! getSelectedConfig(config('company_type')) !!}
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>经营状态：</label>
                        <div class="layui-input-block" style="width: 200px;">
                            <select name="company_status" lay-verify="required">
                                <option value="">请选择</option>
                                @if(isset($company->company_status))
                                    {!! getSelectedConfig(config('company_status'),$company->company_status) !!}
                                @else
                                    {!! getSelectedConfig(config('company_status')) !!}
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>员工人数：</label>
                        <div class="layui-input-block" style="width: 200px;">
                            <select name="scale_id" lay-verify="required">
                                <option value="">请选择</option>
                                @if(isset($company->scale_id))
                                    {!! getSelectedConfig(config('company_scale'),$company->scale_id) !!}
                                @else
                                    {!! getSelectedConfig(config('company_scale')) !!}
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>主营行业：</label>
                        <div class="layui-input-inline">
                            <select name="one" class="one select" lay-filter="one">
                                <option value="">请选择</option>
                                @foreach($category as $key=>$value)
                                    <option value="{{$value->id}}">{{$value->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="layui-input-inline" style="display: none;width: 178px;" id="tow_input">
                            <select name="tow"  class="tow select" lay-filter="tow" id="tow">
                                <option value="">请选择</option>
                            </select>
                        </div>
                        <div class="layui-input-inline" style="display: none;width: 178px;" id="three_input">
                            <select name="three" class="three select" lay-filter="three" id="three">
                                <option value="">请选择</option>
                            </select>
                        </div>
                        <div class="layui-input-inline" id="four_input" style="display: none;width: 178px;">
                            <select name="four" class="four select" lay-filter="four" id="four">
                                <option value="">请选择</option>
                            </select>
                        </div>
                        <div class="layui-input-inline" id="five_input" style="display: none;width: 178px;">
                            <select name="five" class="five select" lay-filter="five" id="five">
                                <option value="">请选择</option>
                            </select>
                        </div>

                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>主营产品：</label>
                        <div class="layui-input-block">
                            <textarea class="layui-textarea layui-hide" name="business" id="business_editor" lay-verify="business">@if(isset($company->business)){{$company->business}}@endif</textarea>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>联系人：</label>
                        <div class="layui-input-block">
                            <input type="text" value="@if(isset($company->name)){{$company->name}}@endif" name="name" placeholder="请输入昵称" class="layui-input" style="width: 200px;">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>联系电话：</label>
                        <div class="layui-input-block">
                            <input type="text" value="@if(isset($company->mobile)){{$company->mobile}}@endif" name="mobile" placeholder="请输入昵称" class="layui-input" style="width: 200px;">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>经营地址</label>
                        <div class="layui-input-inline" style="width: 178px;">
                            <select name="province" class="select" lay-filter="province">
                                <option value="">请选择</option>
                                @foreach($area as $key=>$value)
                                    @if(isset($company->province) && !empty($company->province) && ($value->id == $company->province))
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
                            <input type="text" value="@if(isset($company->office)){{$company->office}}@endif" name="office" placeholder="请输入联系地址" class="layui-input" style="width: 554px;">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>公司简介：</label>
                        <div class="layui-input-block">
                            <textarea class="layui-textarea layui-hide" name="description" id="description_editor" lay-verify="description">@if(isset($company->description)){{$company->description}}@endif</textarea
                        </div>
                    </div>

                    <div class="layui-form-item" style="padding-top: 18px;">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="submit" lay-filter="submit">下一步</button>
                        </div>
                    </div>
                    <input type="hidden" name="category_id" id="category_id" value="@if(isset($company->category_id)){{$company->category_id}}@endif">
                    {!! csrf_field() !!}
                    {{ Form::close() }}
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        layui.use(['form', 'layedit', 'laydate','upload','util'], function() {
            var form = layui.form(),
                    layer = layui.layer,
                    layedit = layui.layedit,
                    laydate = layui.laydate,
                    util = layui.util;

            var description_editor = layedit.build('description_editor',{
                tool: ['strong', 'italic', 'underline', 'del', '|','left','center','right', '|','link','unlink', '|','face','image'],
                height: 250,
            });
            var business_editor = layedit.build('business_editor');

            form.verify({
                description: function() {
                    if(layedit.getContent(description_editor).length < 5) {
                        return '公司简介至少得5个字符啊';
                    }
                },
                business: function() {
                    if(layedit.getContent(business_editor).length < 5) {
                        return '主营产品至少得5个字符啊';
                    }
                }
            });

            $(document).ready(function() {
                @if(isset($company->province))area("@if(isset($company->province)){{$company->province}}@endif",'city_input','city',"@if(isset($company->city)){{$company->city}}@endif");@endif
                @if(isset($company->city))area("@if(isset($company->city)){{$company->city}}@endif",'county_input','county',"@if(isset($company->county)){{$company->county}}@endif");@endif
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

            form.on('select(one)', function (data) {
                var category_id = data.value;
                $("#category_id").val(category_id);
                category(category_id,'tow_input','tow','');
            });

            form.on('select(tow)', function (data) {
                var category_id = data.value;
                $("#category_id").val(category_id);
                category(category_id,'three_input','three','');
            });

            form.on('select(three)', function (data) {
                var category_id = data.value;
                $("#category_id").val(category_id);
                category(category_id,'four_input','four','');
            });

            form.on('select(four)', function (data) {
                var category_id = data.value;
                $("#category_id").val(category_id);
                category(category_id,'five_input','five','');
            });

            function category(category_id,show_input,option,select_id){
                if(category_id != ''){
                    var html = '';
                    $.ajax({
                        url: "{{url('center/category/check')}}",
                        type: 'post',
                        data: {id:category_id},
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        success:function(result){
                            console.log(result.status);
                            if(result.status =='1'){
                                $('#three_input').show();
                                var html = '';
                                $.ajax({
                                    url: "{{url('center/category/category')}}",
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
                                        return true;
                                    }
                                });
                            }
                        }
                    });
                }
            }

            //监听提交
            form.on('submit(submit)', function(data) {
                loadShow();
                $.ajax({
                    url: "{{url('center/company/one')}}",
                    type: 'post',
                    data:  {
                        title:data.field.title,
                        company_code:data.field.company_code,
                        company_status:data.field.company_status,
                        company_type:data.field.company_type,
                        scale_id:data.field.company_type,
                        business:layedit.getContent(business_editor),
                        name:data.field.name,
                        mobile:data.field.name,
                        province:data.field.province,
                        city:data.field.city,
                        county:data.field.county,
                        office:data.field.office,
                        description:layedit.getContent(description_editor),
                        category_id:data.field.category_id,
                    },
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success:function(result){
                        console.log(result.status);
                        layer.msg(result.message);
                        if(result.status == true){
                            window.location.href = result.url;
                        }
                        loadFadeOut();
                    }
                });

                return false;
            });
        });
    </script>
@stop