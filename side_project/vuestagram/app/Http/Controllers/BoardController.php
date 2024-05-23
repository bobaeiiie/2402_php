<?php

namespace App\Http\Controllers;

use App\Exceptions\MyValidateException;
use App\Models\Board;
use MyToken;
use MyBoardValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * 초기 보드 리스트 획득
     * 
     * @param string $id 마지막 게시글 pk
     * 
     * @return response() json
     */
    public function index($id) {
        // 유효성 체크용 데이터 초기화
        $requestData = [
            'id' => $id
        ];

        // 유효성 체크
        $validator = MyBoardValidate::myValidate($requestData);

        // 유효성 검사 실패 시 처리 
        if($validator->fails()) {
            throw new MyValidateException('E01');

        }

        // 게시글 정보 획득
        // $id === 0일 경우 최초 게시글 습득
        // $id !== 0일 경우 해당 아이디 까지의 모든 데이터 습득
        $boardList = Board::join('users', 'boards.user_id', '=', 'users.id')
                            ->select('boards.*', 'users.name')
                            ->orderBy('boards.id', 'DESC')
                            ->when($id, function($query, $id) {
                                return $query->where('boards.id', '>=', $id);
                            })
                            ->unless($id, function($query, $id) {
                                return $query->limit(20);
                            })
                            ->get();
        
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $boardList->toArray()
        ];

        return response()->json($responseData, 200);
    }

    /**
     * 추가 보드 리스트 획득
     * 
     * @param string $id 마지막 게시글 pk
     * 
     * @return response() json
     */
    public function addIndex($id) {
        // 유효성 체크용 데이터 초기화
        $requestData = [
            'id' => $id
        ];

        // 유효성 체크
        $validator = MyBoardValidate::myValidate($requestData);

        // 유효성 검사 실패 시 처리 
        if($validator->fails()) {
            throw new MyValidateException('E01');

        }

        // 게시글 정보 획득
        // $id === 0일 경우 최초 게시글 습득
        // $id !== 0일 경우 해당 아이디 까지의 모든 데이터 습득
        $boardList = Board::join('users', 'boards.user_id', '=', 'users.id')
                            ->select('boards.*', 'users.name')
                            ->orderBy('boards.id', 'DESC')
                            ->where('boards.id', '<', $id)
                            ->limit(20)
                            ->get();
        
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $boardList->toArray()
        ];

        return response()->json($responseData, 200);
    }

    /**
     * 글 작성
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return string json
     */
    public function store(Request $request) {

        // 유효성 체크용 데이터 초기화
        $requestData = [
            'content' => $request->content
            ,'img' => $request->img
        ];

        // 유효성 체크
        $validator = MyBoardValidate::myValidate($requestData);

        // Log::

        // 유효성 검사 실패 시 처리 
        if($validator->fails()) {
            throw new MyValidateException('E01');
        }

        // insert 데이터 생성
        $insertData = $request->only('content');
        $insertData['user_id'] = MyToken::getValueInPayload($request->bearerToken(), 'idt');
        $filePath = $request->file('img')->store('img');
        $insertData['img'] = '/'.$filePath;
        $insertData['like'] = 0;

        // insert 처리
        $boardInfo = Board::create($insertData);
        

        // response 처리
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $boardInfo
        ];

        return response()->json($responseData, 200);
    }
}
