<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectedSchedule extends Model
{
    protected $table = 'selected_schedules';

    protected $fillable = ['selected_program_id', 'filename'];

    public function program()
    {
        return $this->belongsTo(SelectedProgram::class);
    }



    public function selected_student()
    {
        return $this->hasOne(SelectedStudent::class);
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 0: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Одобрено</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонено</div>';
        }
    }

    // public function months_hour()
    // {
    //     return $this->hasOne(MonthsHour::class);

    // }
}
