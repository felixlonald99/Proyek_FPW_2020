<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
    protected $connection= 'mysql';
    protected $table = 'invoice';
    public $timestamps = false;
}
