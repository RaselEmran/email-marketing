<?php

namespace App\Models\Group;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'group';
    protected $fillable = ["name", "status", 'free_email_check', 'free_email_check_date', 'bulk_check', 'bulk_check_date', 'email_list_check', 'email_list_verify_date'];

    public function emaillist(){
        return $this->hasMany('App\Models\EmailList\EmailList');
    }
}
