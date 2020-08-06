<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';

    protected $fillable = ['bid_id', 'filename'];

    public function bid()
    {
        return $this->belongsTo(Bid::class);
    }

    public function schedule()
    {
        return $this->hasOne( Schedule::class);
    }
}
