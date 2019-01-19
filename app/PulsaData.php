<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PulsaData extends Model
{
    //
    public $primaryKey="id_pulsa";

    protected $fillable = [
        'jumlah_pulsa', 'masa_aktif', 'harga_pulsa',
    ];
}
