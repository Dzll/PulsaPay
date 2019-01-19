<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Notifiable;

class PayData extends Model
{
    public $timestamp = true;
    //
    protected $fillable = [
        'id_pay', 'nominal_pay', 'id_user', 'status',
    ];
    
}
