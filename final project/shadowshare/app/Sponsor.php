<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table="tbl_sponsors";
    protected $primarykey="sponsor_id";

    public $fillable=[
        
        'login_id',
        'occupation',
        'Motto',
        'sstatus',  
    ];
}