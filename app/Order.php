<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'mobil_id', 'quantity', 'total', 'payment_method', 'payment_status'];

    public function mobil()
    {
      return $this->belongsTo('App\Mobil');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    protected $table = 'order';
}
