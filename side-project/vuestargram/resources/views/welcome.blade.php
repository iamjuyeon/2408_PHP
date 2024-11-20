<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js')}}" defer></script>
    <title>Vuestargram💬</title>
</head>
<body>
    {{-- #app --}}
    <div id="app"> 
        {{-- 이름 규칙 : 컴포넌트 두글자는 "-"로 이어준다 --}}
        <App-Component></App-Component>
    </div>
</body>
</html>