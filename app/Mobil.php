<?php

namespace App;

use Auth;
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

  public function like($id)
  {
    $like = Favorite::where('user_id', Auth::user()->id)->where('mobil_id', $id)->first();
    return $like;
  }

  protected $table = 'mobil';
}
