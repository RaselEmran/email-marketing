<?php

namespace App\Models\Translation;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $table = 'locales';

    protected $fillable = ['locale', 'code', 'language', 'name'];
}
