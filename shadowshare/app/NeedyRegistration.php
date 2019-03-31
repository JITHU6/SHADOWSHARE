<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\needyRegistration;
class NeedyRegistration extends Model
{
    protected $table="tbl_register";
    protected $primarykey="reg_id";
    
    public $fillable=[
           'name',
            'addressline1',
            'addressline2',
            'panchayath_id',
            'pincode',
            'phonenumber',
            'image',
            'status',
        
    ];
}