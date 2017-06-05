<script type="text/javascript" src="{{ asset("assets/frontend/util_libs/humane/humane.min.js") }}"></script>
<link href="{{ asset('assets/frontend/util_libs/humane/themes/jackedup.css') }}" rel="stylesheet" type="text/css">
@if (count($errors) > 0)
    <script type="text/javascript">
        @foreach ($errors->all() as $error)
        humane.log("{{ $error }}")
        @endforeach
    </script>
@endif