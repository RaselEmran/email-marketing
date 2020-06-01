<?php

namespace App\Models\Activity;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = ["user_id","ip","message"];

    //this method name has to be model name
    public function user(){
        return $this->belongsTo('App\User');
    }

    // save activity information
    public static function saveActivity($user_id, $message){
        $activity = new Activity();
        $activity->user_id = $user_id;
        $activity->ip = $_SERVER['REMOTE_ADDR'];
        $activity->message = $message;
        $activity->save();
    }
}
