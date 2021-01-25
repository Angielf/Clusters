<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthsHour extends Model
{
    protected $table = 'months_hours';

    protected $fillable = ['schedule_id', 'month_1', 'estimated_1', 'real_1', 'status_1',
    'month_2', 'estimated_2', 'real_2', 'status_2',
    'month_3', 'estimated_3', 'real_3', 'status_3',
    'month_4', 'estimated_4', 'real_4', 'status_4',
    'month_5', 'estimated_5', 'real_5', 'status_5',
    'month_6', 'estimated_6', 'real_6', 'status_6',
    'month_7', 'estimated_7', 'real_7', 'status_7',
    'month_8', 'estimated_8', 'real_8', 'status_8',
    'month_9', 'estimated_9', 'real_9', 'status_9',
    'month_10', 'estimated_10', 'real_10', 'status_10',
    'month_11', 'estimated_11', 'real_11', 'status_11',
    'month_12', 'estimated_12', 'real_12', 'status_12',
     'school_schedule_id'];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function sender() {
        return $this->belongsTo(User::class, 'school_schedule_id', 'id');
    }

    public function getStatus_1()
    {
        switch ($this->status_1) {
            case 9: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Подтверждено</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонено</div>';
            case 0: return '<div></div>';

        }
    }

    public function getStatus_2()
    {
        switch ($this->status_2) {
            case 9: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Подтвеждено</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонено</div>';
            case 0: return '<div></div>';

        }
    }

    public function getStatus_3()
    {
        switch ($this->status_3) {
            case 9: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Подтвеждено</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонено</div>';
            case 0: return '<div></div>';

        }
    }

    public function getStatus_4()
    {
        switch ($this->status_4) {
            case 9: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Подтвеждено</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонено</div>';
            case 0: return '<div></div>';

        }
    }

    public function getStatus_5()
    {
        switch ($this->status_5) {
            case 9: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Подтвеждено</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонено</div>';
            case 0: return '<div></div>';

        }
    }

    public function getStatus_6()
    {
        switch ($this->status_6) {
            case 9: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Подтвеждено</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонено</div>';
            case 0: return '<div></div>';

        }
    }

    public function getStatus_7()
    {
        switch ($this->status_7) {
            case 9: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Подтвеждено</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонено</div>';
            case 0: return '<div></div>';

        }
    }

    public function getStatus_8()
    {
        switch ($this->status_8) {
            case 9: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Подтвеждено</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонено</div>';
            case 0: return '<div></div>';

        }
    }

    public function getStatus_9()
    {
        switch ($this->status_9) {
            case 9: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Подтвеждено</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонено</div>';
            case 0: return '<div></div>';

        }
    }

    public function getStatus_10()
    {
        switch ($this->status_10) {
            case 9: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Подтвеждено</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонено</div>';
            case 0: return '<div></div>';

        }
    }

    public function getStatus_11()
    {
        switch ($this->status_11) {
            case 9: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Подтвеждено</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонено</div>';
            case 0: return '<div></div>';

        }
    }

    public function getStatus_12()
    {
        switch ($this->status_12) {
            case 9: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Подтвеждено</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонено</div>';
            case 0: return '<div></div>';

        }
    }

}
