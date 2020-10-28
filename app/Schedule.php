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

    public function getStatus()
    {
        switch ($this->status) {
            case 0: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Одобрено</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонено</div>';
        }
    }
}
