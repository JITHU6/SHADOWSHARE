<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table="tbl_equipments";
    protected $primarykey="equipment_id";
    
    public $fillable=
            [
                'seller_id',
                'category_id',
                'cname',
                'price',
                'condition',
                'description',
                'image',
                'pickupaddress',
                'status'
];
}