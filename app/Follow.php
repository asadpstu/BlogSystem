<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'customerId', 'blogger','hasRestriction'
    ];

    protected $hidden = [
        'id',
    ];


}
