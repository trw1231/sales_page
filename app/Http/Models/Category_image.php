<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Category_image extends Model
{
    protected $table = 'images';
    protected $fillable = ['category_sale_id','content','content_type','sort'];

    

}
