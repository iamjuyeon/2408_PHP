<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'board_id'; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'content',
        'img',
        'like',
    ];



    // *****time zone format when serializing Json*****

    // @param DateTimeInterface $date

    // @return String('Y-m-d H:i:s')


    protected function serializeDate(\DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    public function boards(){
        return $this->belongsTo(User::class, 'user_id');
    }
}