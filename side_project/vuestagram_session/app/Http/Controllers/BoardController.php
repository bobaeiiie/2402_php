<?php

namespace App\Http\Controllers;

use App\Exceptions\MyValidateException;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BoardController extends Controller
{
    // 최초 게시글
    public function index() {
        $boardData = Board::select('boards.*', 'users.name')
                                ->join('users', 'users.id', '=', 'boards.user_id')
                                ->orderBy('id', 'DESC')
                                ->limit(20)
                                ->get();
        $responseData = [
            'code' => '0'
            ,'msg' => '게시글 획득 완료'
            ,'data' => $boardData->toArray()
        ];

        return response()->json($responseData, 200);
    }

    // 추가 게시글
    public function moreIndex($id) {
        $boardData = Board::select('boards.*', 'users.name')
                                ->join('users', 'users.id', '=', 'boards.user_id')
                                ->where('boards.id', '<', $id)
                                ->orderBy('boards.id', 'DESC')
                                ->limit(20)
                                ->get();
        $responseData = [
            'code' => '0'
            ,'msg' => '추가 게시글 획득 완료'
            ,'data' => $boardData->toArray()
        ];

        return response()->json($responseData, 200);
    }
    
    // 게시글 작성
    public function store(Request $request) {

        // 유효성 검사
        $validator = Validator::make(
            $request->only('content', 'img')
            ,[
                'content' => ['required', 'min:1', 'max:200']
                ,'img' => ['required', 'image']
            ]
            );

        // 유효성 검사 실패 시 처리
        if($validator->fails()) {
            throw new MyValidateException('E01');
        }

        // 파일 저장
        $filepath = $request->file('img')->store('img');

        // insert 데이터 생성
        // 모델 인스턴스하는 방법
        $boardModel = Board::select('boards.*', 'users.name')
                                ->join('users', 'users.id', '=', 'boards.id')
                                ->where('users.id', Auth::id())
                                ->first();

        $boardModel->content = $request->content;
        $boardModel->img = $filepath;
        $boardModel->user_id = Auth::id();
        $boardModel->save();

        // $insertData = $request->only('content');
        // $insertData['user_id'] = Auth::id();
        // $insertData['img'] = '/'.$filepath;
        // $insertData['like'] = 0;

        // insert 처리
        // $insertData = Board::create($boardModel);

        // response 처리
        $responseData = [
            'code' => '0'
            ,'msg' => '게시글 작성 완료'
            ,'data' => $boardModel->toArray()
        ];

        // 리턴
        return response()->json($responseData, 200);
    }

    // 게시글 삭제
    public function delete(Request $request) {
        $boardId = $request->id;
        Log::debug('보드아이디 : '. $boardId);
        $selectBoard = Board::find($boardId);
        
        //
        $responseData = [
            'code' => '0'
            ,'msg' => '게시글 삭제 완료'
            ,'data' => $selectBoard
            // ,'errorFlg' => false
        ];

        $selectBoard->delete();
        return response()->json($responseData, 200);
    }
}
