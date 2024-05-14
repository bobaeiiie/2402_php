@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '로그인')

{{-- 바디에 vh 클래스 부여 --}}
@section('bodyClassVh')
<body class="vh-100">
@endsection

{{-- 메인 처리 --}}
@section('main')
<main class="vh-100 d-flex justify-content-center place-items-center">
    <form style="width: 300px" action="{{route('post.login')}}" method="post" class="login-form m-auto justify-content-center">
        @csrf
        <div class="mb-3">
            {{-- 에러 메세지 표시 --}}
            @if($errors->any())
            <div class="form-text text-danger">
                {{-- 에러 메세지 루프 처리 --}}
                @foreach($errors->all() as $error)
                <span>{{ $error }}</span>
                <br>
                @endforeach
            </div>
            @endif
            <label for="email" class="form-label">이메일</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">비밀번호</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">로그인</button>
            <a href="{{ route('regist.index') }}" class="btn btn-secondary text-light float-end" role="button">회원가입</a>
        </div>
    </form>
</main>
@endsection