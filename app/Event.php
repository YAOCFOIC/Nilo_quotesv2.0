<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    //
    protected $table = "events";
    protected $fillable=[
    	'title','color','users_id','start_date','end_date','email_visit','phone_visit','name_visit'
    ];

    

    public function user()
    {
    	return $this->belongsTo('App\User','users_id','id');
    }
}
