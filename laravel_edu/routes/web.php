<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// --------------------------------------------------------------------------
// 라우터 정의
// --------------------------------------------------------------------------
// 문자열 리턴
Route::get('/hi', function() {
    return '안녕하세요';
});

Route::get('/hello', function() {
    return 'Hello';
});

// 뷰파일 리턴
Route::get('/myview', function() {
    return view('myView');
});

//http 메소드에 대응하는 라우터
Route::get('/home', function () {
    return view('home');
});

Route::post('/home',function() {
    return 'POST HOME';
});

Route::put('/home', function() {
    return 'PUT HOME';
});

Route::delete('/home', function() {
    return 'DELETE HOME';
});

// 라우터에서 파라미터 제어
// 파라미터 획득
Route::get('/param', function(Request $request) {
    return 'ID: '.$request->id.', name: '.$request->name;
});
// http://localhost:8000/param?id=1234&name=홍길동
// -> ID: 1234, name: 홍길동


// 세그먼트 파라미터
Route::get('/segment/{id}/{gender}', function($id, $gender) {
    return $id.' : '.$gender;
});
// http://localhost:8000/segment/123/f
// -> 123: f
// 받아온 파라미터는 모두 사용해야 함

// 세그먼트 파라미터를 기본값 설정
Route::get('/segment3/{id?}', function($id = 'base'){
    return $id;
});

// 라우터명 지정
Route::get('/name', function() {
    return view('name');
});

// name 메소드 이용
Route::get('/name/home/php505/root', function() {
    return 'URL 매우 길다';
})->name('name.root');

// 뷰에 데이터 전달
// with(키, 값) 메소드를 이용해서 뷰에 전달
// 뷰에서는 $키로 접근 사용이 가능

Route::get('/send', function() {
    return view('send')
    ->with('gender', '무성')
    ->with('name', '홍길동');
});

// 배열에 키 담아서 작성하는 방법
// Route::get('/send', function() {
//     return view('send')
//     ->with([
//         'gender' => '무성'
//         ,'name' => '홍길동'
//     ]);
// });

// 배열의 값 전달할 때, 배열 자체가 with 메소드의 값
Route::get('/send', function() {

    $arr = [
        'id' => '1'
        ,'email' => 'admin@admin.com'
    ];

    return view('send')
    ->with('gender', '무성')
    ->with('name', '홍길동')
    ->with('data', $arr);
});






// 존재하지 않는 router 정의
// 가능하면 최하단에 배치. 버전에 따라 동작하지 않는 경우 있음 
Route::fallBack(function() {
    return '없는 URL입니다.';
});

