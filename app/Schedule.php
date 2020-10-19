<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = ['program_id', 'filename'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }



    public function student()
    {
        return $this->hasOne(Student::class);
    }
}
