<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class CategorySell extends Model
{
    protected $table = 'category_sale';

    protected $fillable = [
        'username_id', 'name_id', 'namesale',
    ];

}
