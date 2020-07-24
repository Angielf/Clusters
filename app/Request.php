<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'Request';

    protected $fillable = ['subject', 'class', 'content'];
}
