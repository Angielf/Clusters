<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $table = 'agreements';

    protected $fillable = ['student_id', 'filename'];

    // public function student()
    // {
    //     return $this->belongsTo(Student::class);
    // }
}
