<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>iview example</title>
    <link rel="stylesheet" type="text/css" href="http://unpkg.com/iview/dist/styles/iview.css">
    <script type="text/javascript" src="http://v1.vuejs.org/js/vue.min.js"></script>
    <script type="text/javascript" src="http://unpkg.com/iview@1.0.1/dist/iview.min.js"></script>

    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">--}}
    {{--<script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>--}}
</head>
<body>
<div id="app">
    <i-button @click="show">Click me!</i-button>
    <Modal :visible.sync="visible" title="Welcome">欢迎使用 iView</Modal>

    <div>
        <i-col span="12">
            <Date-picker type="date" placeholder="选择日期" style="width: 200px"></Date-picker>
        </i-col>
    </div>

    <div>
        <i-button>Default</i-button>
        <i-button type="primary">Primary</i-button>
        <i-button type="ghost">Ghost</i-button>
        <i-button type="dashed">Dashed</i-button>
        <i-button type="text">Text</i-button>
        <br><br>
        <i-button type="info">信息按钮</i-button>
        <i-button type="success">成功按钮</i-button>
        <i-button type="warning">警告按钮</i-button>
        <i-button type="error">错误按钮</i-button>
    </div>
</div>
<script>
    new Vue({
        el: '#app',
        data: {
            visible: false
        },
        methods: {
            show: function () {
                this.visible = true;
            }
        }
    })
</script>
</body>
</html>