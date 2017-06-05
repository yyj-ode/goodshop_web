{{--<script src="{{ elixir('js/main.js') }}"></script>--}}
<script src="{{asset('plugins/layui/layui.js')}}"></script>
<script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset('dist/js/common.js')}}"></script>
<script type="text/javascript">
    layui.config({
        base: '/plugins/layui/lay/modules/',
        version: '1484130829910'
    });

//    window.global = {
//        preview: function(){
//            var preview = document.getElementById('LAY_preview');
//            return preview ? preview.innerHTML : '';
//        }()
//    };

    layui.use(['form', 'layedit', 'laydate','util'], function(){
        var util = layui.util;
        var $ = layui.jquery;
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "7000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        $(document).ready(function() {loadFadeOut();});
    });
</script>

<ul class="layui-fixbar">
    <li class="layui-icon" lay-type="bar1" style="" title="问题反馈"></li>
    <li class="layui-icon layui-fixbar-top" lay-type="top" style="display: list-item;"></li>
</ul>