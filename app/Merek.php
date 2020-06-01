<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $fillable = ['name'];

    public function jumlah($id)
    {
        $mobil = Mobil::where('merek_id', $id)->count();
        return $mobil;
    }

    protected $table = 'merek';
}
