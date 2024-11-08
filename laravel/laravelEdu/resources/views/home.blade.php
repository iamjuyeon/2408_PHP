<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
</head>
<body>
    <h1>홈</h1>
    <form action="/home" method="post">
        {{-- 라라벨이 자동으로 csrf token 만들어줌 --}}
        @csrf 
        <button type="submit">POST</button>
    </form>
    <hr>
    <form action="/home" method="post">
        @csrf
        @method('PUT')
        <button type="submit">PUT</button>
    </form>
    <hr>
    <form action="/home" method="post">
        @csrf
        @method('DELETE')
    <button type="submit">DELETE</button>
    </form>
    <hr>
    <form action="/home" method="post">
        @csrf
        @method('PATCH')
        <button type="submit">PATCH</button>
    </form>
</body>
</html>