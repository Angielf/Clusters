<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
