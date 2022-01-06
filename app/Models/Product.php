<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = ['id'];
    use HasFactory;

    public function subcategory()
    {
        return $this->belongsTo('App\Models\Category', 'subcategory_id');
    }
    public function main_category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
