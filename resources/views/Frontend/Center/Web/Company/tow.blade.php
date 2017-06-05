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
                        <label class="layui-form-label"><em>*</em>法定代表人：</label>
                        <div class="layui-input-inline">
                            <input type="text" value="@if($company->corporation){{$company->corporation}}@endif" name="corporation" lay-verify="required" placeholder="请输入公司名称" class="layui-input" style="width: 300px;">
                        </div>
                        <div class="layui-input-inline" style="clear: both;width: 400px;margin-left: 110px;">
                            请按照工商营业执照真实填写。
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>注册资金：</label>
                        <div class="layui-input-inline">
                            <input type="text" value="@if($company->capital){{$company->capital}}@endif" name="capital"  placeholder="请输入工商注册号" lay-verify="required" class="layui-input" style="width: 300px;">
                        </div>
                        <div class="layui-input-inline" style="clear: both;width: 400px;margin-left: 110px;">
                            请按照工商营业执照真实填写。
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>经营模式：</label>
                        <div class="layui-input-block" style="width: 200px;">
                            <select name="company_pattern" lay-verify="required">
                                <option value="">请选择</option>
                                @if(isset($company->company_pattern))
                                    {!! getSelectedConfig(config('company_pattern'),$company->company_pattern) !!}
                                @else
                                    {!! getSelectedConfig(config('company_pattern')) !!}
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>成立时间：</label>
                        <div class="layui-input-inline" style="width: 200px;">
                            <input type="text" onclick="layui.laydate({elem: this, festival: true})" value="@if(isset($company->operation_startdate)){{$company->operation_startdate}}@endif" name="operation_startdate" placeholder="请输入昵称" class="layui-input" style="width: 200px;">
                        </div>
                        <div class="layui-form-mid">-</div>
                        <div class="layui-input-inline" style="width: 200px;">
                            <input type="text" onclick="layui.laydate({elem: this, festival: true})" value="@if(isset($company->operation_enddate)){{$company->operation_enddate}}@endif" name="operation_enddate" placeholder="请输入昵称" class="layui-input" style="width: 200px;">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>年营业额：</label>
                        <div class="layui-input-block" style="width: 200px;">
                            <select name="company_sales" lay-verify="required">
                                <option value="">请选择</option>
                                @if(isset($company->company_sales))
                                    {!! getSelectedConfig(config('company_sales'),$company->company_sales) !!}
                                @else
                                    {!! getSelectedConfig(config('company_sales')) !!}
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>销售区域：</label>
                        <div class="layui-input-inline">
                            <select name="company_sales_area" lay-verify="required">
                                <option value="">请选择</option>
                                @if(isset($company->company_sales_area))
                                    {!! getSelectedConfig(config('company_sales_area'),$company->company_sales_area) !!}
                                @else
                                    {!! getSelectedConfig(config('company_sales_area')) !!}
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>公司网址：</label>
                        <div class="layui-input-block">
                            <input type="text" value="@if($company->web){{$company->web}}@endif" name="web" lay-verify="required" placeholder="请输入公司名称" class="layui-input" style="width: 300px;">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>公司注册地：</label>
                        <div class="layui-input-inline" style="width: 178px;">
                            <select name="company_province" class="select" lay-filter="province">
                                <option value="">请选择</option>
                                @foreach($area as $key=>$value)
                                    @if(isset($company->company_province) && !empty($company->company_province) && ($value->id == $company->company_province))
                                        <option value="{{$value->id}}" selected="selected">{{$value->name}}</option>
                                    @else
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="layui-input-inline" style="display: none;width: 178px;" id="city_input">
                            <select name="company_city"  class="select" lay-filter="city" id="city">
                                <option value="">请选择</option>
                            </select>
                        </div>
                        <div class="layui-input-inline" style="display: none;width: 178px;" id="county_input">
                            <select name="company_county" class="select" lay-filter="county" id="county">
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
                        <label class="layui-form-label"><em>*</em>银行账号：</label>
                        <div class="layui-input-block">
                            <input type="text" value="@if(isset($company->bank_account)){{$company->bank_account}}@endif" name="bank_account" placeholder="请输入昵称" class="layui-input" style="width: 200px;">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>营业执照：</label>
                        <div class="layui-input-block">
                            <input type="file" name="file" class="layui-upload-file">
                            <div class="ftx03">仅支持JPG、GIF、PNG、JPEG、BMP格式，文件小于4M</div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><em>*</em>公司图片：</label>
                        <div class="layui-input-block">
                            <input type="file" name="file" class="layui-upload-file">
                            <div class="ftx03">仅支持JPG、GIF、PNG、JPEG、BMP格式，文件小于4M</div>
                        </div>
                    </div>

                    <div class="layui-form-item" style="padding-top: 18px;">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="previous" lay-filter="submit">上一步</button>
                            <button class="layui-btn" lay-submit="next" lay-filter="submit">下一步</button>
                        </div>
                    </div>
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

            layui.upload({
                elem:'.layui-upload-file',
                url: "{{ url('center/uploads/image') }}",
                ext: 'jpg|png|gif|jpeg',
                before: function (input) {
                    console.log(input);
                    console.log('文件上传中');
                },
                success: function (json) {
                    $('#image_id').val(json.data.fileId);
                    console.log(json); //上传成功返回值，必须为json格式
                }
            });

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
                @if(isset($company->company_province))area("@if(isset($company->company_province)){{$company->company_province}}@endif",'city_input','city',"@if(isset($company->company_city)){{$company->company_city}}@endif");@endif
                @if(isset($company->company_city))area("@if(isset($company->company_city)){{$company->company_city}}@endif",'county_input','county',"@if(isset($company->company_county)){{$company->company_county}}@endif");@endif
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
                    url: "{{url('center/company/tow')}}",
                    type: 'post',
                    data:  {
                        corporation:data.field.corporation,
                        capital:data.field.capital,
                        company_pattern:data.field.company_pattern,
                        operation_startdate:data.field.operation_startdate,
                        operation_enddate:data.field.operation_enddate,
                        company_sales:data.field.company_sales,
                        company_sales_area:data.field.company_sales_area,
                        web:data.field.web,
                        company_province:data.field.company_province,
                        company_city:data.field.company_city,
                        company_county:data.field.company_county,
                        office:data.field.office,
                        bank_account:data.field.bank_account,
                        category_id:data.field.category_id,
                    },
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success:function(result){
                        console.log(result.status);
                        layer.msg(result.message);
                        if(result.status == true){
                            //window.location.href = result.url;
                        }
                        loadFadeOut();
                    }
                });

                return false;
            });
        });
    </script>
@stop