<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function eduUser() {
        
        // ----------------------------
        // Query Builder
        // ----------------------------


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
        // $result = DB::table('users')
        //         ->select('name')
        //         ->orderBy('name', 'ASC')
        //         ->get();

        // select * from users where id in (?, ?); [2, 5]
        // $result = DB::table('users')
        //         ->whereIn('id', [2, 5])
        //         ->get();

        // select * from users where deleted_at is null
        // $result = DB::table('users')
        //         ->whereNull('deleted_at')
        //         ->get();

        // 2023년에 가입한 사람만 출력
        // select * from users where year(created_at) = ? [2023]
        // select * from users created_at between 20230101000000 and 20231231235959
        // $result = DB::table('users')
        //         ->whereYear('created_at', '2023')
        //         ->get()->dd();


        // 성별당 회원의 수를 구하자
        // SELECT gender, COUNT(gender) FROM users GROUP BY gender;
        // $result = DB::table('users')
        //         ->select('gender', DB::raw('count(gender)'))
        //         ->groupBy('gender')
        //         ->having('gender', '=', 'M')
        //         ->get();


        // select id, name from users order by id limit ? offset ?; [1, 2]
        // $result = DB::table('users')
        //         ->select('id', 'name')
        //         ->orderBy('id')
        //         ->limit(1)
        //         ->offset(2)
        //         ->get();

        // 실행 메소드 first() : 쿼리 결과에서 가장 첫번째 레코드만 반환
        $result = DB::table('users')->first();

        // 실행 메소드 count() : 쿼리 결과의 레코드 수를 반환
        $result = DB::table('users')->count();

        // 실행 메소드 find() : 지정된 기본 키에 해당하는 레코드를 반환
        $result = DB::table('users')->find(4);




        // $reqData = null; // 유저가 1 또는 2인 데이터 전달
        // $result = DB::table('users')
        //         ->when($reqData, function($query, $reqData) {
        //             $query->where('id', $reqData);
        //         })
        //         ->dd();
        
        // insert
        // $result = DB::table('users')->insert([
        //     'name' => '김영희'
        //     ,'email' => 'kim@admin.com'
        //     ,'password' => Hash::make('qwer1234!')
        //     ,'gender' => 'F'
            
        // ]);

        // update
        // $result = DB::table('users')
        //         ->where('id', '15')
        //         ->update([
        //             'email' => 'kim@naver.com'
        // ]);

        // delete
        // $result = DB::table('users')
        //         ->where('id', '15')
        //         ->delete();


        // ----------------------
        // Eloquent Model
        // ----------------------

        // select
        // $result = User::all(); 
        // $result = User::find(4); 

        // upsert > insert (create)
        // $data = [
        //     'name' => '김영희'
        //     ,'email' => 'kim@naver.com'
        //     ,'password' => Hash::make('qwer1234!')
        //     ,'gender' => 'F'
        // ];
        // $result = User::create($data);

        // upsert > update / (save)
        // DB::beginTransaction();
        // $target = User::find(17);
        // $target->gender = 'M';
        // $result = $target->save();
        // DB::beginTransaction();

        // delete
        // $result = User::destroy(17);

        // soft delete된 데이터 조회하는 방법
        $result = User::withTrashed()->get(); // 소프트 딜리트 포함
        $result = User::onlyTrashed()->get(); // 소프트 딜리트만

        // soft delete된 데이터 복원하는 방법
        $result = User::where('id', 17)->restore();
        









        return var_dump($result);

    }
}
