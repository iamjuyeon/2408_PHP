<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'user_id'; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account',
        'name',
        'password',
        'gender',
        'profile',
        'refresh_token', //인증 관련된 토큰
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'refresh_token',
    ];

    // *****time zone format when serializing Json*****

    // @param DateTimeInterface $date

    // @return String('Y-m-d H:i:s')

    protected function serializeDate(\DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    public function boards() {
        return $this->hasMany(Board::class, 'user_id');
    }
}
