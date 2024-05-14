@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '에러 페이지')

{{-- 바디에 vh 클래스 부여 --}}
@section('bodyClassVh')
<body class="vh-100">
@endsection

{{-- 메인 처리 --}}
@section('main')
<main class="vh-100 d-flex justify-content-center place-items-center h-75">
    <div>
        <h2>404 에러</h2>
        <p>존재하지 않는 페이지입니다.</p>
        <a href="{{ route('get.login') }}">로그인 페이지로 돌아가기</a>
    </div>
</main>
@endsection