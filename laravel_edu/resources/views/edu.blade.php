{{-- 상속 --}}
@extends('layout.layout')

{{-- @section : 부모 탬플릿에 해당하는 yield 부분에 삽입--}}
@section('title', '에듀')

{{-- @section ~ @endsection : 처리해야 할 코드가 많을 경우 범위 지정 삽입 --}}
@section('main')
<main>
    <h2>자식 탬플릿 메인</h2>
</main>
@endsection

@section('show')
<h2>자식 show입니다</h2>
<h3>자식자식</h3>
@endsection

{{-- 제어문 --}}
{{-- @if : 조건문 --}}
@if($gender === 'F')
    <span>성별 : 여자</span>
@elseif($gender === 'M')
    <span>성별 : 남자</span>
@else
    <span>성별 : 기타</span>
@endif
<hr>

{{-- 반복문 --}}
{{-- @for @ @for : 반복문 --}}
@for($i = 0; $i <5; $i++)
    <span>for : {{ $i }} </span>
@endfor
<hr>

{{-- @foreach ~ @foreach : 반복문 --}}
<h2>foreach 문</h2>
{{-- 
    $loop :
    foreach, forelse에서
    루프의 정보를 담은 자동으로 생성되는 객체
    --}}
@foreach($data as $key => $val)
    <h4>루프 횟수{{ $loop->count }}</h4>
    <h4>남은 루프 횟수{{ $loop->remaining }}</h4>
    <span> {{ $key.' : '.$val }} </span>
    <br>
@endforeach
<hr>
{{-- 
    @forelse ~ @empty ~ @endforelse :
    루프를 할 데이터의 길이가 1이상이면 루프 처리,
    배열의 길이가 0이면 empty 처리 
    --}}
<h2>forelse 문</h2>
@forelse($data2 as $key => $val)
    <span> {{ $key.' : '.$val }} </span>
    <br>
@empty
    <span>빈 배열입니다.</span>
@endforelse

<hr>

{{-- 구구단 찍기 --}}
@for($dan = 2; $dan < 10; $dan++)
    <span>{{ $dan.'단' }}</span>
        <br>
        @for($num = 1; $num < 10; $num++)
            <span> {{ $dan.' X '.$num.' = '.($dan * $num) }} </span>
            <br>
        @endfor
@endfor

<hr>