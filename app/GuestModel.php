<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestModel extends Model
{
    protected $table= 'guest';
    protected $primaryKey = 'mobile_number';
    protected $fillable= [
        'nama',
        'email',
        'mobilenumber',
        'password',
        'saldo',
        'status'
    ];
}
