<?php

namespace App\Models\Translation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Language extends Model
{
    protected $table = 'languages';

    protected $fillable = ['locale', 'status'];

    // taken lacale info
    public static function langDetail($locale)
    {
       return DB::table('locales')->where('locale', $locale)->first();

    }
}
