@extends('Frontend.Center.Web.Layout.layui')

@section('seo')
    @include('Frontend.Center.Web.Layout.mainSeo')
@stop

@section('content')
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>用户信息</legend>
    </fieldset>

    <table class="layui-table" lay-even="" lay-skin="nob">
        <colgroup>
            <col width="100">
            <col>
        </colgroup>
        <tbody>
            <tr>
                <td class="layui-form-label">头像：</td>
                <td>@if(isset($result->images)){{$result->images}}@endif</td>
            </tr>
            <tr>
                <td class="layui-form-label">会员ID：</td>
                <td>@if(isset($result->id)){{$result->id}}@endif</td>
            </tr>
            <tr>
                <td class="layui-form-label">会员名：</td>
                <td>@if(isset($result->username)){{$result->username}}@endif</td>
            </tr>
            <tr>
                <td class="layui-form-label">姓名：</td>
                <td>@if(isset($result->really_name)){{$result->really_name}}@endif</td>
            </tr>
            <tr>
                <td class="layui-form-label">手机号码：</td>
                <td>@if(isset($result->mobile)){{$result->mobile}}@endif</td>
            </tr>
            <tr>
                <td class="layui-form-label">邮箱：</td>
                <td>@if(isset($result->email)){{$result->email}}@endif</td>
            </tr>
            <tr>
                <td class="layui-form-label">联系地址：</td>
                <td>@if(isset($result->address)){{$result->address}}@endif</td>
            </tr>
            <tr>
                <td class="layui-form-label">邮编：</td>
                <td>@if(isset($result->post_code)){{$result->post_code}}@endif</td>
            </tr>
        </tbody>

    </table>
    <div>
        <a href="{{url('center/user/edit')}}"><div class="layui-btn layui-btn-normal">修改个人信息</div></a>
    </div>
@stop

@section('js')

@stop