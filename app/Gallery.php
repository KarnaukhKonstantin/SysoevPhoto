<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $fillable = ['name', 'link', 'category_id', 'period', 'is_main_photo'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
