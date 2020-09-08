<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'category', 'title', 'description', 'photo','status'
    ];
}
