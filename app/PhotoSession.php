<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoSession extends Model
{
    protected $table = 'photo_session';
    protected $fillable = ['name'];

    public function photos()
    {
        return $this->hasMany(Gallery::class, 'photo_session_id');
    }
}
