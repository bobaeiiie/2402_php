@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '게시판')

{{-- 자바스트립트 파일 --}}
@section('script')
    <script src="/js/board.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>
@endsection

{{-- 메인 처리 --}}
@section('main')

<div class="text-center mt-5 mb-5">
    <h1>{{ $boardNameInfo->name }}</h1>
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#0d6efd" class="bi bi-plus-circle-fill"
        viewBox="0 0 16 16" data-bs-toggle="modal" data-bs-target="#modal-insert">
        <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
    </svg>
</div>

<main>
    <!-- 카드 -->
    @foreach($data as $item)
        <div class="card" id="card{{ $item->id }}">
            <img src="{{ $item->img }}" class="card-img-top">
            <div class="card-body">
                {{-- <h5 class="card-title">{{ $item->title }}</h5> --}}
                <h4 class="card-title text-truncate" style="max-width: 300px;">{{ $item->title }}</h4>
                <p class="card-text text-truncate" style="max-width: 300px;">{{ $item->content }}</p>
                <button href="#"
                    class="btn btn-primary my-btn-detail"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-detail"
                    value="{{ $item->id }}">상세</button>
            </div>
        </div>
    @endforeach

</main>

<!-- 상세 모달 -->
<div class="modal" tabindex="-1" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p></p>
                    <br>
                    <img src="" class="card-img-top" alt="메모">
                </div>
                <div class="modal-footer justify-content-between">
                    <div>
                        <button id="my-btn-update" type="button" class="btn btn-warning" data-bs-dismiss="modal">수정</button>
                        <button id="my-btn-delete" type="button" class="btn btn-danger" data-bs-dismiss="modal">삭제</button>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- 작성 모달 -->
<div class="modal" tabindex="-1" id="modal-insert">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('board.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="{{ $boardNameInfo->type }}">
                <div class="modal-header">
                    <input type="text" class="form-control" name="title" placeholder="제목을 입력하세요">
                </div>
                <div class="modal-body">
                    <textarea class="form-control" name="content" cols="30" rows="10" placeholder="내용을 입력하세요"
                        style="resize: none;"></textarea>
                    <br><br>
                    <input type="file" accept="image/*" name="file" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                    <button type="submot" class="btn btn-primary">작성</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection