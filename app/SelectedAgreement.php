<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectedAgreement extends Model
{
    protected $table = 'selected_agreements';

    protected $fillable = ['selected_student_id', 'filename'];

}
