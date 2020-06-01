<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'mobil_id'];

    public function mobil()
    {
        return $this->belongsTo('App\Mobil');
    }

    protected $table = 'favorite';
}
