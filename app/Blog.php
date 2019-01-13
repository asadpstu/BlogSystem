<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Blog extends Model
{


    protected $fillable = [
        'title', 'blogDescription', 'like',''
    ];

    protected $hidden = [
        'bloggerId',
    ];

    public function getBlogPosterName()
    {
    	return User::where('id',$this->bloggerId)->first()->name; 
    }



}
