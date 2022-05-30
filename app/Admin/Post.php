<?php

namespace App\Admin;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'post_image',
        'content',
        'category_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category() {
        return $this->hasOne(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public static function generateSlug($string) {
        $i = 1;
        $baseSlug = (string)Str::of($string)->slug('-');
        $slug = $baseSlug;
        while(self::where('slug', $slug)->first()) {
            $slug = "$baseSlug-$i";
            $i++;
        }
        return $slug;
    }

}
