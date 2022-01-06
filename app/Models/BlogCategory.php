<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $guarded = ['id'];
    protected $table = 'blog_categories';
    use HasFactory;

    public function blogs() {
        return $this->hasMany('App\Models\Blog');
    }
}
