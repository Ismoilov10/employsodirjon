<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Employee extends Model implements  CanResetPasswordContract
{
    use hasfactory, Notifiable, CanResetPassword;

    protected $casts = [
        'id' => 'string'
    ];
    protected $fillable = [
        'name', 'email','phone','email','date_of_birth','sex','image', 'email','verification_code','role_id',
    ];

    protected $hidden = [
        'password','employee_token'
    ];
}
