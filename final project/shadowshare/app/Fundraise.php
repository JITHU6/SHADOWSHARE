<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundraise extends Model
{
    protected $table="tbl_fundraises";
    protected $primarykey="fid";
    
    public $fillable=
            [
               'casetitle',
               'discription',
               'image',
               'amount',
               'city',
               'address',
               'account',
               'status'
];
}