<?php

namespace App\Models\EmailList;

use Illuminate\Database\Eloquent\Model;

class EmailList extends Model
{
    protected $table = 'email_list';
    protected $fillable = ["group_id", "name", "email", 'free_email_check', 'free_email_value', 'bulk_check', 'bulk_value', 'email_list_check', 'email_list_value'];
}
