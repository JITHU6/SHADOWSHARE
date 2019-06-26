<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table="tbl_question";
    protected $primarykey="question_id";
    
    public $fillable=[
        
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d'
        
        
    ];
    
}