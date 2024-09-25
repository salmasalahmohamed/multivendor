<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class Customer extends Authenticatable implements MustVerifyEmail
{
    use HasFactory,Notifiable,TwoFactorAuthenticatable;
    protected $guarded=[];
}
