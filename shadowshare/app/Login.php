<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use illuminate\Contracts\Auth\Authenticatable;

class Login extends Model
{
    protected $table="tbl_login";
    
    
    public $fillable=[
        'reg_id',
        'email',
        'password',
        'type',
        'status',
        'remember_token'
        
    ];
}