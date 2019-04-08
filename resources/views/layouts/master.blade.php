<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Larabook</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
{{-- @section - открывает именованную секцию--}}
{{-- @show - закрывает секциию, открытую дерективой @section, и сразу выводит ее содержимое--}}
{{-- @yild - выводит контент именованной секции по имени--}}
@section('menu')
    <div class="main-menu col-md-12">
        <ul class="nav nav-pills nav-justified">
            <li role="presentation" {{$page == 'Home' ? 'class=active': ''}}>
                <a href="{{url('topic')}}">Main Page</a>
            </li>
            <li role="presentation" {{$page == 'Forms' ? 'class=active': ''}}>
                <a href="{{url('block/create')}}">Content Control</a>
            </li>
        </ul>
    </div>
@show
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>
</body>
</html>