<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $guarded = ['id'];
    use HasFactory;

    public function category()
    {
        return $this->belongsTo('App\Models\BlogCategory');
    }
}
