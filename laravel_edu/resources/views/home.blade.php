<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>
    <form action="/home" method="post">
        {{-- CSRF 토큰 추가 --}}
        @csrf
        <button type="submit">POST</button>
    </form>
    <br>
    <form action="/home" method="post">
        @csrf
        @method('PUT')
        <button type="submit">PUT</button>
    </form>
    <br>
    <form action="/home" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">DELETE</button>
    </form>
</body>
</html>