<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectedProgram extends Model
{
    protected $table = 'selected_programs';

    protected $fillable = ['school_id', 'proposed_program_id'];

    public function proposed_program()
    {
        return $this->belongsTo(Proposed::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'school_id', 'id');
    }

    public function selected_schedule()
    {
        return $this->hasOne(SelectedSchedule::class);
    }

}
