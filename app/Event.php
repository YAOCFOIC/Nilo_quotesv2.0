<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Event extends Model
{
    //
    protected $table = "events";
    protected $fillable=[
    	'title','color','users_id','start_date','end_date','email'
    ];

    

    public function user()
    {
    	return User::find($this->users_id);
    }
}
