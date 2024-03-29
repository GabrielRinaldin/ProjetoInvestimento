<?php

namespace App\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Faker\Factory;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'cpf',
        'name',
        'phone',
        'birth',
        'gender',
        'notes',
        'email',
        'password',
        'status',
        'permission'
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'user_groups');
    }

    public function moviments()
    {
        return $this->hasMany(Moviment::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

    public function getFormattedCpfAttribute()
    {
        $cpf = $this->attributes['cpf'];
        return \substr($cpf, 0, 3) . '.' . \substr($cpf, 3, 3) . '.' . \substr($cpf, 7, 3) . '-' . \substr($cpf, -2);
    }

    public function getFormattedPhoneAttribute()
    {
        $phone = $this->attributes['phone'];
        return  '(' . \substr($phone, 0, 2) . ') ' . \substr($phone, 2, 5) . '-' . \substr($phone, -4);
    }

    public function getFormattedBirthAttribute()
    {

        $birth = explode('-', $this->attributes['birth']);
        if (count($birth) != 3)
            return "";


        $birth = $birth[2] . '/' . $birth[1] . '/' . $birth[0];
        return $birth;
    }

    public function accesses()
    {
        return $this->hasMany(Access::class);
    }

};
