<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';

    protected $fillable = ['subject', 'class', 'content', 'user_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 0: return '<div class="alert alert-warning" role="alert">В рассмотрении</div>';
            case 1: return '<div class="alert alert-success" role="alert">Одобрена</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонена</div>';
        }
    }
}
