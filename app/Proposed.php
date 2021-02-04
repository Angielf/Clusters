<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposed extends Model
{
    protected $table = 'proposed_programs';

    protected $fillable = ['subject', 'class', 'content', 'user_id', 'modul', 'hours', 'educational_program',
        'educational_activity', 'form_of_education', 'form_education_implementation', 'date_begin', 'date_end',
         'filename'];

    public function user()
    {
        return $this->belongsTo(User::class);
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


    public function getDataBegin()
    {
        $date = $this->date_begin;
        if($date !== NULL) {
            $year = substr($date, 0, -6);
            $month = substr($date, 5, -3);
            $day = substr($date, -2);
            $date_begin = $day . "-" . $month . "-" . $year;
            return $date_begin;
        }
        else return '';
    }

    public function getDataEnd()
    {
        $date = $this->date_end;
        if($date !== NULL) {
            $year = substr($date, 0, -6);
            $month = substr($date, 5, -3);
            $day = substr($date, -2);
            $date_end = $day . "-" . $month . "-" . $year;
            return $date_end;
        }
        else return '';
    }

    public function selected_programs()
    {
        if ($selected_programs = SelectedProgram::where('proposed_program_id', $this->id)->get()) {
            return $selected_programs;
        } else return false;

    }

}
