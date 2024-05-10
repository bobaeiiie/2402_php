<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // 트레이트
    // 해당 모델에 소프트딜리트를 적용시키고 싶으면 SoftDeletes 추가
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    // // 모델과 이어질 테이블 명을 정의하는 프로퍼티
    // protected $table = 'user';

    // // pk를 지정하는 프로퍼티
    // protected $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // fillable 화이트리스트 : upsert 시 변경 허용할 컬럼을 설정하는 프로퍼티
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
    ];

    // guarded 블랙리스트 : upsert 시 변경 비허용할 컬럼을 설정하는 프로퍼티
    // protected $guarded = [
    //     'id'
    // ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
}
