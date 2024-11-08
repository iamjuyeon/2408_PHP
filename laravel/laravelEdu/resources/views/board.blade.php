<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>보오오오오드</title>
</head>
<body>
    {{-- 헤더 불러오기 --}}
    @include('layout.header')

    <main>
        <p>메인이다</p>
    </main>

    {{-- 풋터 불러오기 --}}
    @include('layout.footer', ['key1' => '세종대왕'])
</body>
</html>

