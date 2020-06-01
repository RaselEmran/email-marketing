<?php

namespace App\Models\EmailHistory;

use Illuminate\Database\Eloquent\Model;

class EmailHistory extends Model
{
    protected $table = 'email_history';
    protected $fillable = ["sender_id","email_list","template_id","subject"];
}
