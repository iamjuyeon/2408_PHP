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
    //class 안에 use
    // trait(트레이트) : 상속 기능은 아니고, 우리가 정의해둔 트레이트 객체를 가져와서 사용할 수 있음
    //다른 언어에는 없음!!

    // softdeletes 트레이트 : 해당 모델에 소프트 딜리트를 적용하고 싶을때 추가
   use HasApiTokens, HasFactory, Notifiable, SoftDeletes; // softdeletes하면 소프트 삭제
// 테이블마다 pk가 다르면 pk 지정해줘야함
protected $primaryKey = 'u_id';

//테이블명 정의하는 프로퍼티(디폴트는 모델명의 복수형)
protected $table = 'users';



const CREATED_AT = 'u_created_at';
const UPDATED_AT = 'u_updated_at';
const DELETED_AT = 'u_deleted_at';
    

// ---------------------
//upsert시 변경을 허용할 컬럼들을 설정하는 프로퍼티(화이트 리스트)
//내가 허용할 리스트 작성
protected $fillable = [
    'u_email'
    ,'u_password'
    ,'u_name'
    ,'u_created_at'
    ,'u_updated_at'
    ,'u_deleted_at'
];


//upsert시 변경을 불허할 컬럼들을 설정하는 프로퍼티(블랙 리스트)
//허용하지 않을 리스트 작성
// protected $guarded = [
//     'id'
// ];


}
