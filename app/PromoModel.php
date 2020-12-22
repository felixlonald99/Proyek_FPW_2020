<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoModel extends Model
{
    //
    protected $connection= 'mysql';
    protected $table = 'promo';
    public $timestamps = false;
}
