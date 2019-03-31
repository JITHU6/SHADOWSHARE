<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table="tbl_category";
    protected $primarykey="category_id";
    
    public $fillable=[
           'categoryname',
            'status'
        
    ];
}