<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $table = 'clusters';

    protected $fillable = ['user_id', 'district_id', 'schools', 'status', 'agreement'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function getBids()
    {
        if ($bids = Bid::where('cluster_id', $this->id)->get()) {
            return $bids;
        } else return false;
    }
}
