<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegionCluster extends Model
{
    protected $table = 'region_clusters';

    protected $fillable = ['filename'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
