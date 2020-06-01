<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class EmailCheckerApi extends Model
{
    protected $table = 'api';
    protected $fillable = ["provider","key"];

}
