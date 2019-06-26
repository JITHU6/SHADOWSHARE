<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table="tbl_sellers";
    protected $primarykey="seller_id";

    public $fillable=[
        
        'login_id',
        'verificationid',
        'status',  
    ];
}