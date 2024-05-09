<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function eduUser() {
        // Query Builder
        // $result = DB::select('select * from users');

        // select

        // $result = DB::select(
        //     "select * from users where name = :name"
        //     ,['name' => '갑돌이']
        // );
        // $result = DB::select(
        //     "select * from users where name = ? or name = ? "
        //     ,['갑돌이', '갑순이']
        // );
        // $result = DB::select(
        //     "select * from users where deleted_at is not null "
        // );

        // insert

        // $sql =
        //     "INSERT INTO users(name, email, password)
        //     VALUES (?, ?, ?)";
        // $data =['김철수', 'admin4@admin.com', Hash::make('qwer1234!')];
        // DB::beginTransaction(); // 트랜잭션 시작
        // $result = DB::insert($sql, $data); // 트랜잭션 시작
        // if(!$result) {
        //     DB::rollBack(); // 롤백
        // } else {
        //     DB::commit(); // 커밋
        // }

        // update

        // $sql = 
        //     "UPDATE users SET deleted_at = null where id = ?";
        // $data = [6];
        // $result = DB::update($sql, $data);

        // delete
        // $sql = "DELETE from users WHERE id = ?";
        // $data = [8];
        // $result = DB::update($sql, $data);
        
        // ----------------------------
        // 쿼리 빌더 체이닝
        // ----------------------------
        // users 테이블 모든 데이터 조회
        // $result = DB::table('users')->get();
        // $result = DB::table('users')->where('name', '=','홍길동')->get()->dd();
        // 자동으로 값에 대한 prepared statement 실행시킴

        // select * from users where id = ? or id = ?; [3, 4]
        // $result = DB::table('users')
        //         ->where('id', 4)
        //         ->orWhere('id', 5)
        //         ->get();
        
        // select * from users where name = ? and id = ?; [홍길동, 3]
        // $result = DB::table('users')
        //         ->where('name','홍길동')
        //         ->where('id', 4)
        //         ->get();

        // select name from users order by name ASE;
        $result = DB::table('users')
                ->select('name')
                ->orderBy('name', 'ASC')
                ->get();

        // WHERE 나머지는 내일



        return var_dump($result);
    }
}
