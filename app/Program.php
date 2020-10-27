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


    public function getStatus()
    {
        switch ($this->status) {
            case 9: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Одобрена</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонена</div>';
        }
    }
}
