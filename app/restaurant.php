<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class restaurant extends Model
{
    protected $fillable = [
        'name',
        'address',
        'body'
    ];
}
