@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '회원가입')

{{-- 회원가입용 --}}
@section('script')
    <script src="/js/regist.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>
@endsection

{{-- 바디에 vh 클래스 부여 --}}
@section('bodyClassVh')
<body class="vh-100">
@endsection

{{-- 메인 처리 --}}
@section('main')
    <main class="vh-100 d-flex justify-content-center place-items-center">
        <form style="width: 300px" action="{{route('regist.store')}}" method="post" class="login-form m-auto justify-content-center">
            @csrf
            <div class="mb-3">
                <h2 style="text-align: center">회원 가입 페이지</h2>
                <hr>
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
                <label for="name" class="form-label">이름</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label mb-4">이메일</label>
                <span id="print-chk-email"></span>
                <button type="button" id="btn-chk-email" class="btn btn-secondary float-end">이메일 중복</button>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">비밀번호</label>
                <input type="password" class="form-control mb-3" name="password" id="password">
            </div>
            {{-- <div class="mb-3">
                <label for="password_chk" class="form-label">비밀번호 확인</label>
                <input type="password" class="form-control mb-3" name="password_chk" id="password_chk">
            </div> --}}
            <a href="{{ route('get.login') }}" class="btn btn-secondary">취소</a>
            <button type="submit" id="btn-com" class="btn btn-primary float-end" disabled="disabled">완료</button>
        </form>
    </main>
@endsection