@extends('Frontend.Center.Web.Layout.base')

@section('seo')
    @include('Frontend.Center.Web.Layout.seo')
@stop

@section('content')

    <div class="layui-tab layui-tab-brief" lay-filter="demoTitle">
        <ul class="layui-tab-title site-demo-title">
            <li class="layui-this">所有回答</li>
        </ul>
        <div class="layui-body layui-tab-content site-demo site-demo-body">
            <div class="layui-tab-item layui-show">
                <div class="layui-main">
                    <table class="layui-table" lay-even="" lay-skin="nob">
                        <colgroup>
                            <col width="50">
                            <col>
                            <col width="86">
                            <col width="165">
                            <col width="168">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>指导意见</th>
                            <th>回答时间</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($allData['answers']) && !empty($allData['answers']))
                        @foreach($allData['answers'] as $key=>$value)
                        <tr>
                            <td><a href="{{url('answer/s'.$value['question_id'].'.html')}}">{{$value['question_id']}}</a></td>
                            <td>{{$value['suggestion']}}</td>
                            <td>已完成</td>
                            <td>{{$value['created_at']}}</td>
                            <td>
                                <a href="javascript:;" data-id="{{$value['question_id']}}" class="link01b supplyBtn">补充回答</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>

                    <div class="page_question">
                        @if(isset($allData['pageUrl']) && $allData['totalPage']>1)
                            {!! $allData['pageUrl'] !!}
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="textarea-content" style="display: none">
        <textarea placeholder="请输入内容" class="layui-textarea" id="content" style="width: 500px;height: 300px"></textarea>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">
        layui.use('layer', function() { //独立版的layer无需执行这一句
            var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句

//            var editIndex = layedit.build('LAY_editor');

            $('.supplyBtn').on('click',function () {

                var $this = $(this), id = $this.data('id');

                layer.confirm('您是如何看待前端开发？',
                    {
                        type: 1,
                        title:'补充回答',
                        shadeClose: true,
                        shade: 0.4,
                        anim: 5,
                        maxmin: false,
                        area: ['500px', '400px'], //宽高
                        skin: 'layui-layer-nobg',
                        btn: ['保存','取消'], //按钮
                        content: $('#textarea-content'),
                    },
                    function(){
                        var content = $('#content').val();

                        if(content != ''){
                            $.ajax({
                                url: "{{url('answer/supply')}}",
                                type: 'post',
                                data: {'q_id':id,'content':content,'type':'8'},
                                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                success:function(result){
                                    console.log(result.status);
                                    if(result.status == true){
                                        layer.msg('保存成功!', {
                                            time: 2000, //20s后自动关闭
                                            btn: ['确定','关闭']
                                        });

                                        layer.open({
                                            type: 1,
                                            title: false, //不显示标题栏
                                            closeBtn: false,
                                            area: '300px;',
                                            shade: 0.8,
                                            id: 'LAY_layuipro', //设定一个id，防止重复弹出
                                            btn: ['关闭窗口', '再次编辑'],
                                            moveType: 1, //拖拽模式，0或者1
                                            content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">感谢提交！<br><br>我们此后的征途是星辰大海 ^_^<br></div>',
                                            success: function(layero){
                                                layer.closeAll();
                                            }
                                        });

                                    }
                                }
                            });
                            layer.closeAll();
                        } else {
                            layer.msg('内容不能为空!', {
                                time: 2000, //20s后自动关闭
                                btn: ['确定','关闭']
                            });
                        }
                    },
                    function(){
                        layer.closeAll();
                    }
                );
            });
        })
    </script>
@stop