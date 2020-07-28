<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $table = 'clusters';

    protected $fillable = ['user_id', 'district_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
