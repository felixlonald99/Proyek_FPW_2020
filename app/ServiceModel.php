<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    protected $connection= 'mysql';
    protected $table = 'service';
    public $timestamps = true;
}
