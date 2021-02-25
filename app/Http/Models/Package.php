<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';
    protected $fillable = [
        'name_package','price','page_count',
    ];
}
