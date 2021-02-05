<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectedStudent extends Model
{
    protected $table = 'selected_students';

    protected $fillable = ['selected_schedule_id', 'filename', 'students_amount'];

    public function selected_schedule()
    {
        return $this->belongsTo(SelectedSchedule::class);
    }

    public function selected_agreement()
    {
        return $this->hasOne(SelectedAgreement::class);
    }
}
