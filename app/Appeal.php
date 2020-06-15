<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    protected $table = 'appeals';

    protected $fillable = [

        'fio', 'class', 'subject', 'status', 'user_id', 'date_of_appeal', 'comment', 'filename',

    ];
}
