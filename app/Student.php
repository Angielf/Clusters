<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = ['schedule_id', 'filename', 'students_amount'];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
