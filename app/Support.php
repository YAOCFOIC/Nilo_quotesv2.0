<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class support extends Model
{
    //
    protected $fillable = [
		'category', 'question','solution','file'
    ];
}
