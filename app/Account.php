<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table= 'users';
    protected $fillable= [
        'name',
        'email',
        'password'
    ];
    public $timestamps= true;
}
