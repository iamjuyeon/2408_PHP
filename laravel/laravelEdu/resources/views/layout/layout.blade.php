<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '레이아웃')</title>
</head>
<body>
    @include('layout.header')

    {{-- 보통 메인은 자식쪽에 정의 --}}
    @yield('main')

    @section('show')
        <h1>부모 show입니다</h1>
        <h1>많은 처리</h1>
    @show

    @include('layout.footer')

</body>
</html>