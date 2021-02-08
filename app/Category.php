<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const IS_OTHER = 0;
    const IS_WEDDING = 1;

    protected $table = 'categories';
    protected $fillable = ['name'];

    public function photos()
    {
        return $this->hasMany(Gallery::class, 'category_id');
    }
}
