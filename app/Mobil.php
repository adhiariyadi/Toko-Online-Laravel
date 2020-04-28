<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobil extends Model
{
    use SoftDeletes;

    protected $fillable = ['merek_id', 'type', 'price', 'gambar', 'stock'];

    public function merek()
    {
      return $this->belongsTo('App\Merek');
    }

    protected $table = 'mobil';
}
