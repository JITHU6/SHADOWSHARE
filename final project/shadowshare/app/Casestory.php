<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Casestory extends Model
{
    protected $table="tbl_casestory";
    protected $primarykey="case_id";
    
    public $fillable=
            [
                'category_id',
                'user_id',
                'amount',
                'equipmentid',
                'casetitle',
                'caseimage',
                'question',
                'answer',
                'edescription',
                'verification_address',
                'verification_document',
                'cstatus'
];
}