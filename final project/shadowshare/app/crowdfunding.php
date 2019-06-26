<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crowdfunding extends Model
{
    protected $table="tbl_crowdfundings";
    protected $primarykey="d_id";
    
    public $fillable=
            [
               'fevent_id',
               'country',
               'city',
               'state_id',
               'fname',
               'lname',
               'email',
               'occupation',
               'phone',
               'add1',
               'add2',
               'amount',
               'status'
];

           
}