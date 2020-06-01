<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    protected $fillable = ['order_id', 'foto', 'nama_bank', 'nama_pengirim'];

    protected $table = 'bukti';
}
