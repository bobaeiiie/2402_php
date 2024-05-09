<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- 
        @yield : 자식 탬플릿에서 해당하는 section에게 자리를 양보
                자식에게 section이 없으면 두번째 아규먼트 출력
        --}}
    <title>@yield('title', '부모 타이틀')</title>
</head>
<body>
    {{-- @include : 다른 블레이드 탬플릿을 포함시키는 방법 --}}
    @include('layout.header', ['name' => '홍길동'])
    
    @yield('main')

{{-- @section ~ @show : 자식 탬플릿에 해당하는 section없을 시 부모 코드 실행 --}}
    @section('show')
    <h2>부모 show입니다</h2>
    <h3>여러 처리 중</h3>
    @show

    @include('layout.footer')
</body>
</html>