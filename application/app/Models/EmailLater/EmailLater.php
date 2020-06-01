<?php

namespace App\Models\EmailLater;

use Illuminate\Database\Eloquent\Model;

class EmailLater extends Model
{
    protected $table = 'email_later';
    protected $fillable = ["sender_id","email_list","template_id","subject","send_time"];
}
