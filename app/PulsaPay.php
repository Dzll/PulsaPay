<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Notifiable;

class PulsaPay extends Model
{
    public $timestamp = true;
    //
    protected $fillable = [
        'id_pulsapay', 'nominal_pay', 'id_user',
    ];
}
