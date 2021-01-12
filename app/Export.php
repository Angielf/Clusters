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
                // ->where('status', '1')
                ->get();

        $array = $bids->map(function ($b, $key) {

             return [
                "district" => $b->user->getDistrict->fullname,
                "fullname_r" => $b->user->fullname,

                "inn_r" => $b->user->inn,

                "fullname_b" => (($b->status === 1)) ? $b->programs()->sortByDesc('status')->first()->
                sender()->first()->fullname : '',

                "inn_b" => (($b->status === 1)) ? $b->programs()->sortByDesc('status')->first()->
                sender()->first()->inn : '',

                "class" => $b->getClasses(),
                "subject" => $b->subject,
                "modul" => $b->modul,
                "hours" => $b->hours,
                "form_of_education" => $b->form_of_education,
                "form_education_implementation" => $b->form_education_implementation,
                "EducationalPrograms" => $b->getEducationalPrograms(),
                "EducationalActivities" => $b->getEducationalActivities(),

                "date_begin" => $b->getDataBegin(),
                "date_end" => $b->getDataEnd(),

                "content" => $b->content,

                "program" => (($b->status === 1)) ? $b->programs()->sortByDesc('status')->first()->filename : '',

                "schedule" => (($b->status === 1) and ($b->programs()->sortByDesc('status')->first()->schedule) and ($b->programs()->sortByDesc('status')->first()->schedule->status === 1)) ?
                    $b->programs()->sortByDesc('status')->first()->schedule->filename : '',

                "students_amount" => (($b->status === 1) and ($b->programs()->sortByDesc('status')->first()->schedule) and ($b->programs()->sortByDesc('status')->first()->schedule->status === 1)
                    and ($b->programs()->sortByDesc('status')->first()->schedule->student)) ?
                    $b->programs()->sortByDesc('status')->first()->schedule->student->students_amount : '',

                "students" => (($b->status === 1) and ($b->programs()->sortByDesc('status')->first()->schedule) and ($b->programs()->sortByDesc('status')->first()->schedule->status === 1)
                    and ($b->programs()->sortByDesc('status')->first()->schedule->student)) ?
                    $b->programs()->sortByDesc('status')->first()->schedule->student->filename : '',


                "agreement" => (($b->status === 1) and ($b->programs()->sortByDesc('status')->first()->schedule) and ($b->programs()->sortByDesc('status')->first()->schedule->status === 1)
                    and ($b->programs()->sortByDesc('status')->first()->schedule->student) and ($b->programs()->sortByDesc('status')->first()->schedule->student->agreement)) ?
                    $b->programs()->sortByDesc('status')->first()->schedule->student->agreement->filename : '',

                ];
            });

        return $array;


    }

    public function headings(): array
    {
        return [
            'Муниципалитет',
            'Организация реципиент',
            'ИНН реципиента',
            'Базовая организация',
            'ИНН базовой организации',
            'Класс',
            'Предмет(курс)',
            'Раздел(модуль)',
            'Кол-во часов',
            'Форма',
            'Условия реализации обучения',
            'Образовательная программа',
            'Образовательная деятельность',
            'Начало',
            'Конец',
            'Комментарий',
            'Программа',
            'Расписание',
            'Количество учеников',
            'Список учеников',
            'Договор',
        ];
    }


}
