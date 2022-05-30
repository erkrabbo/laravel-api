<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class User_infos extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'address', 'phone', 'birth'];

    public function users() {
        return $this->belongsTo(User::class);
    }
}
