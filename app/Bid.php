<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';

    protected $fillable = ['subject', 'class', 'content', 'user_id', 'modul', 'hours',
        'form_of_education', 'form_education_implementation', 'rc_cluster_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->hasOne(Program::class);
    }

    public function programs()
    {
        if ($programs = Program::where('bid_id', $this->id)->get()) {
            return $programs;
        } else return false;

    }

    public function getStatus()
    {
        switch ($this->status) {
            case 0: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Одобрена</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонена</div>';
            case 3: return '<div class="alert alert-info" role="alert">Своя программа</div>';

            case 9: return '<div class="alert alert-info" role="alert">Поступило предложение</div>';
        }
    }

    public function getClasses()
    {
        $classes = unserialize($this->class);
        $str = "";
        foreach ($classes as $class) {
            $str .= $class . ", ";
        }

        return substr($str, 0, -2);
    }
}
