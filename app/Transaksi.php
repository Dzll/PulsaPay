<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Notifiable;

class Transaksi extends Model
{
    public $timestamp = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'nama_user', 'nohp_beli', 'id_pulsa', 'jumlah_pulsa', 'harga_pulsa', 'operator', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
}
