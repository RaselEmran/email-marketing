<?php

namespace App\Models\Oauth;

use Illuminate\Database\Eloquent\Model;

class Oauth extends Model
{
    protected $table = 'oauth';

    protected $fillable = ['name','value'];
}
