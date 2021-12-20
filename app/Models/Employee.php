<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use illuminate\Support\Facades\Password;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class Employee extends Model implements CanResetPasswordContract
{
    use hasfactory, Notifiable,CanResetPassword ;

    protected $casts = [
        'id' => 'string'
    ];
    protected $fillable = [
        'name', 'email','phone','date_of_birth','sex','image','verification_code','role_id',
    ];

    protected $hidden = [
        'password','remember_token'
    ];

    public function getEmailForPasswordReset()
    {
        // TODO: Implement getEmailForPasswordReset() method.
    }

    public function sendPasswordResetNotification($token)
    {
//        $this->notify(new );
    }
}
