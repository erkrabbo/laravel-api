<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public function posts() {
        return $this->belongsToMany(Post::class);
    }
}
