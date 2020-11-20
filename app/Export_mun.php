<?php

namespace App;

use App\Bid;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Export_mun implements FromCollection, WithHeadings
{

    public function collection()
    {
        $dis = Auth::user()->getDistrict->id;

        $bids = Bid::whereNull('cluster_id')
                ->WhereNull('rc_cluster_id')
                ->get();



        $array = $bids->map(function ($b, $key) {

            $dis_u = $b->user->district;
            $dis = Auth::user()->getDistrict->id;

            return [

                    "district" => ($dis_u == $dis) ? $b->user->getDistrict->fullname :'',
                    "fullname_r" => ($dis_u == $dis) ? $b->user->fullname :'',

                    "fullname_b" => (($dis_u == $dis) and ($b->status === 1)) ? $b->program->sender()->first()->fullname : '',

                    "class" => ($dis_u == $dis) ? $b->getClasses() :'',
                    "subject" => ($dis_u == $dis) ? $b->subject :'',
                    "modul" => ($dis_u == $dis) ? $b->modul :'',
                    "hours" => ($dis_u == $dis) ? $b->hours :'',
                    "form_of_education" => ($dis_u == $dis) ? $b->form_of_education :'',
                    "form_education_implementation" => ($dis_u == $dis) ? $b->form_education_implementation :'',
                    "EducationalPrograms" => ($dis_u == $dis) ? $b->getEducationalPrograms() :'',
                    "EducationalActivities" => ($dis_u == $dis) ? $b->getEducationalActivities() :'',
                    "content" => ($dis_u == $dis) ? $b->content :'',

                    "program" => (($dis_u == $dis) and ($b->status === 1)) ? $b->program->filename : '',

                    "schedule" => (($dis_u == $dis) and ($b->status === 1) and ($b->program->schedule) and ($b->program->schedule->status === 1)) ?
                        $b->program->schedule->filename : '',

                    "students_amount" => (($dis_u == $dis) and ($b->status === 1) and ($b->program->schedule) and ($b->program->schedule->status === 1)
                        and ($b->program->schedule->student)) ?
                        $b->program->schedule->student->students_amount : '',

                    "students" => (($dis_u == $dis) and ($b->status === 1) and ($b->program->schedule) and ($b->program->schedule->status === 1)
                        and ($b->program->schedule->student)) ?
                        $b->program->schedule->student->filename : '',


                    "agreement" => (($dis_u == $dis) and ($b->status === 1) and ($b->program->schedule) and ($b->program->schedule->status === 1)
                        and ($b->program->schedule->student) and ($b->program->schedule->student->agreement)) ?
                        $b->program->schedule->student->agreement->filename : '',

                    ];
            });

        return $array;
    }


    public function headings(): array
    {
        return [
            'Муниципалитет',
            'Организация реципиент',
            'Базовая организация',
            'Класс',
            'Предмет(курс)',
            'Раздел(модуль)',
            'Кол-во часов',
            'Форма',
            'Условия реализации обучения',
            'Образовательная программа',
            'Образовательная деятельность',
            'Комментарий',
            'Программа',
            'Расписание',
            'Количество учеников',
            'Список учеников',
            'Договор',
        ];
    }


}
