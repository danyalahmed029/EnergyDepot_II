<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/app.css') }}">
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('js/app.js') }}" defer>   </script>
    <meta name="csrf-token" content="https://jwt.io/#debugger-io?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c">
</head>
<body>

<div id="app">
    @yield('content')
</div>
</body>
</html>