<?php

namespace App;

use App\Bid;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Export implements FromCollection, WithHeadings
{

    public function collection()
    {
        $bids = Bid::whereNull('cluster_id')
                ->WhereNull('rc_cluster_id')
                ->where('status', '1')
                ->get();

        return $array = $bids->map(function ($b, $key) {

            return [
                // "id" => $b->id,
                "district" => $b->user->getDistrict->fullname,
                "fullname_r" => $b->user->fullname,
                "fullname_b" => $b->program->sender()->first()->fullname,
                "class" => $b->getClasses(),
                "subject" => $b->subject,
                "modul" => $b->modul,
                "hours" => $b->hours,
                "form_of_education" => $b->form_of_education,
                "form_education_implementation" => $b->form_education_implementation,
                "EducationalPrograms" => $b->getEducationalPrograms(),
                "EducationalActivities" => $b->getEducationalActivities(),
                "content" => $b->content,
                "program" => $b->program->filename,

                "schedule" => (($b->program->schedule) and ($b->program->schedule->status === 1)) ?
                    $b->program->schedule->filename : '',

                "students_amount" => (($b->program->schedule) and ($b->program->schedule->status === 1)
                    and ($b->program->schedule->student)) ?
                    $b->program->schedule->student->students_amount : '',

                "students" => (($b->program->schedule) and ($b->program->schedule->status === 1)
                    and ($b->program->schedule->student)) ?
                    $b->program->schedule->student->filename : '',


                "agreement" => (($b->program->schedule) and ($b->program->schedule->status === 1)
                    and ($b->program->schedule->student) and ($b->program->schedule->student->agreement)) ?
                    $b->program->schedule->student->agreement->filename : '',

                ];
            });
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
