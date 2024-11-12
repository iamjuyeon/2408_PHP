<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BoardsCategory extends Model
{


    //db랑 테이블명이 달라서 따로 지정해줘야 함
    protected $table = 'boards_category';
    protected $primaryKey = 'bc_id';
    protected $fillable = [
        'bc_type',
        'bc_name',
    ];
}
