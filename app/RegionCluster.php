<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegionCluster extends Model
{
    protected $table = 'region_clusters';

    protected $fillable = ['filename', 'organisation', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getClusterName()
    {
        if ($user = User::where('id', $this->organisation)->first()) {
           return $user->fullname;
        } else {
            return "К сожалению, вы не состоите в региональных кластерах";
        }
    }

    public function getBids()
    {
        if ($bids = Bid::where('rc_cluster_id', $this->id)->get()) {
            return $bids;
        } else return false;
    }
}
