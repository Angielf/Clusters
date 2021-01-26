<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Муниципалитет</th>
        <th scope="col">Базовая организация</th>
        <th scope="col">ИНН базовой организации</th>

        <th scope="col">Организация реципиет</th>
        <th scope="col">ИНН реципиента</th>

        <th scope="col">Класс</th>
        <th scope="col">Предмет(курс)</th>
        <th scope="col">Раздел(модуль)</th>
        <th scope="col">Общее кол-во часов</th>
        <th scope="col">Форма</th>
        <th scope="col">Условия реализации обучения</th>
        <th scope="col">Образовательная программа</th>
        <th scope="col">Образовательная деятельность</th>
        <th scope="col">Начало</th>
        <th scope="col">Конец</th>
        <th scope="col">Комментарий</th>


        <th scope="col">Месяц</th>
        <th scope="col">Предполагаемое кол-во часов</th>
        <th scope="col">Реальное кол-во часов</th>
        <th scope="col">Статус</th>
      </tr>
    </thead>
    <tbody>
        @foreach($months_hours as $months_hour)
        @if($months_hour->schedule->program->bid->user->district == Auth::user()->getDistrict->id)
        @if($months_hour->month_1 !== NULL)
        <tr>
            <td>{{$months_hour->sender()->first()->getDistrict->fullname }}</td>
            <td>{{ $months_hour->sender()->first()->fullname}}</td>
            <td>{{ $months_hour->sender()->first()->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->user->fullname}}</td>
            <td>{{ $months_hour->schedule->program->bid->user->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->getClasses() }}</td>
            <td>{{ $months_hour->schedule->program->bid->subject}}</td>
            <td>{{ $months_hour->schedule->program->bid->modul }}</td>
            <td>{{ $months_hour->schedule->program->bid->hours }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_of_education }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_education_implementation }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalPrograms() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalActivities() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataBegin() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataEnd() }}</td>
            <td>{{ $months_hour->schedule->program->bid->content }}</td>

            <td>{{$months_hour->month_1 }}</td>
            <td>{{$months_hour->estimated_1 }}</td>
            <td>{{$months_hour->real_1 }}</td>
            <td>{!! $months_hour->getStatus_1() !!}</td>
        </tr>
        @endif
        @if($months_hour->month_2 !== NULL)
        <tr>
            <td>{{$months_hour->sender()->first()->getDistrict->fullname }}</td>
            <td>{{ $months_hour->sender()->first()->fullname}}</td>
            <td>{{ $months_hour->sender()->first()->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->user->fullname}}</td>
            <td>{{ $months_hour->schedule->program->bid->user->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->getClasses() }}</td>
            <td>{{ $months_hour->schedule->program->bid->subject}}</td>
            <td>{{ $months_hour->schedule->program->bid->modul }}</td>
            <td>{{ $months_hour->schedule->program->bid->hours }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_of_education }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_education_implementation }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalPrograms() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalActivities() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataBegin() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataEnd() }}</td>
            <td>{{ $months_hour->schedule->program->bid->content }}</td>

            <td>{{$months_hour->month_2 }}</td>
            <td>{{$months_hour->estimated_2 }}</td>
            <td>{{$months_hour->real_2 }}</td>
            <td>{!! $months_hour->getStatus_2() !!}</td>
        </tr>
        @endif
        @if($months_hour->month_3 !== NULL)
        <tr>
            <td>{{$months_hour->sender()->first()->getDistrict->fullname }}</td>
            <td>{{ $months_hour->sender()->first()->fullname}}</td>
            <td>{{ $months_hour->sender()->first()->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->user->fullname}}</td>
            <td>{{ $months_hour->schedule->program->bid->user->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->getClasses() }}</td>
            <td>{{ $months_hour->schedule->program->bid->subject}}</td>
            <td>{{ $months_hour->schedule->program->bid->modul }}</td>
            <td>{{ $months_hour->schedule->program->bid->hours }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_of_education }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_education_implementation }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalPrograms() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalActivities() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataBegin() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataEnd() }}</td>
            <td>{{ $months_hour->schedule->program->bid->content }}</td>

            <td>{{$months_hour->month_3 }}</td>
            <td>{{$months_hour->estimated_3 }}</td>
            <td>{{$months_hour->real_3 }}</td>
            <td>{!! $months_hour->getStatus_3() !!}</td>
        </tr>
        @endif
        @if($months_hour->month_4 !== NULL)
        <tr>
            <td>{{$months_hour->sender()->first()->getDistrict->fullname }}</td>
            <td>{{ $months_hour->sender()->first()->fullname}}</td>
            <td>{{ $months_hour->sender()->first()->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->user->fullname}}</td>
            <td>{{ $months_hour->schedule->program->bid->user->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->getClasses() }}</td>
            <td>{{ $months_hour->schedule->program->bid->subject}}</td>
            <td>{{ $months_hour->schedule->program->bid->modul }}</td>
            <td>{{ $months_hour->schedule->program->bid->hours }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_of_education }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_education_implementation }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalPrograms() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalActivities() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataBegin() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataEnd() }}</td>
            <td>{{ $months_hour->schedule->program->bid->content }}</td>

            <td>{{$months_hour->month_4 }}</td>
            <td>{{$months_hour->estimated_4 }}</td>
            <td>{{$months_hour->real_4 }}</td>
            <td>{!! $months_hour->getStatus_4() !!}</td>
        </tr>
        @endif
        @if($months_hour->month_5 !== NULL)
        <tr>
            <td>{{$months_hour->sender()->first()->getDistrict->fullname }}</td>
            <td>{{ $months_hour->sender()->first()->fullname}}</td>
            <td>{{ $months_hour->sender()->first()->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->user->fullname}}</td>
            <td>{{ $months_hour->schedule->program->bid->user->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->getClasses() }}</td>
            <td>{{ $months_hour->schedule->program->bid->subject}}</td>
            <td>{{ $months_hour->schedule->program->bid->modul }}</td>
            <td>{{ $months_hour->schedule->program->bid->hours }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_of_education }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_education_implementation }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalPrograms() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalActivities() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataBegin() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataEnd() }}</td>
            <td>{{ $months_hour->schedule->program->bid->content }}</td>

            <td>{{$months_hour->month_5 }}</td>
            <td>{{$months_hour->estimated_5 }}</td>
            <td>{{$months_hour->real_5 }}</td>
            <td>{!! $months_hour->getStatus_5() !!}</td>
        </tr>
        @endif
        @if($months_hour->month_6 !== NULL)
        <tr>
            <td>{{$months_hour->sender()->first()->getDistrict->fullname }}</td>
            <td>{{ $months_hour->sender()->first()->fullname}}</td>
            <td>{{ $months_hour->sender()->first()->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->user->fullname}}</td>
            <td>{{ $months_hour->schedule->program->bid->user->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->getClasses() }}</td>
            <td>{{ $months_hour->schedule->program->bid->subject}}</td>
            <td>{{ $months_hour->schedule->program->bid->modul }}</td>
            <td>{{ $months_hour->schedule->program->bid->hours }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_of_education }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_education_implementation }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalPrograms() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalActivities() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataBegin() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataEnd() }}</td>
            <td>{{ $months_hour->schedule->program->bid->content }}</td>

            <td>{{$months_hour->month_6 }}</td>
            <td>{{$months_hour->estimated_6 }}</td>
            <td>{{$months_hour->real_6 }}</td>
            <td>{!! $months_hour->getStatus_6() !!}</td>
        </tr>
        @endif
        @if($months_hour->month_7 !== NULL)
        <tr>
            <td>{{$months_hour->sender()->first()->getDistrict->fullname }}</td>
            <td>{{ $months_hour->sender()->first()->fullname}}</td>
            <td>{{ $months_hour->sender()->first()->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->user->fullname}}</td>
            <td>{{ $months_hour->schedule->program->bid->user->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->getClasses() }}</td>
            <td>{{ $months_hour->schedule->program->bid->subject}}</td>
            <td>{{ $months_hour->schedule->program->bid->modul }}</td>
            <td>{{ $months_hour->schedule->program->bid->hours }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_of_education }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_education_implementation }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalPrograms() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalActivities() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataBegin() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataEnd() }}</td>
            <td>{{ $months_hour->schedule->program->bid->content }}</td>

            <td>{{$months_hour->month_7 }}</td>
            <td>{{$months_hour->estimated_7 }}</td>
            <td>{{$months_hour->real_7 }}</td>
            <td>{!! $months_hour->getStatus_7() !!}</td>
        </tr>
        @endif
        @if($months_hour->month_8 !== NULL)
        <tr>
            <td>{{$months_hour->sender()->first()->getDistrict->fullname }}</td>
            <td>{{ $months_hour->sender()->first()->fullname}}</td>
            <td>{{ $months_hour->sender()->first()->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->user->fullname}}</td>
            <td>{{ $months_hour->schedule->program->bid->user->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->getClasses() }}</td>
            <td>{{ $months_hour->schedule->program->bid->subject}}</td>
            <td>{{ $months_hour->schedule->program->bid->modul }}</td>
            <td>{{ $months_hour->schedule->program->bid->hours }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_of_education }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_education_implementation }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalPrograms() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalActivities() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataBegin() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataEnd() }}</td>
            <td>{{ $months_hour->schedule->program->bid->content }}</td>

            <td>{{$months_hour->month_8 }}</td>
            <td>{{$months_hour->estimated_8 }}</td>
            <td>{{$months_hour->real_8 }}</td>
            <td>{!! $months_hour->getStatus_8() !!}</td>
        </tr>
        @endif
        @if($months_hour->month_9 !== NULL)
        <tr>
            <td>{{$months_hour->sender()->first()->getDistrict->fullname }}</td>
            <td>{{ $months_hour->sender()->first()->fullname}}</td>
            <td>{{ $months_hour->sender()->first()->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->user->fullname}}</td>
            <td>{{ $months_hour->schedule->program->bid->user->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->getClasses() }}</td>
            <td>{{ $months_hour->schedule->program->bid->subject}}</td>
            <td>{{ $months_hour->schedule->program->bid->modul }}</td>
            <td>{{ $months_hour->schedule->program->bid->hours }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_of_education }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_education_implementation }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalPrograms() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalActivities() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataBegin() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataEnd() }}</td>
            <td>{{ $months_hour->schedule->program->bid->content }}</td>

            <td>{{$months_hour->month_9 }}</td>
            <td>{{$months_hour->estimated_9 }}</td>
            <td>{{$months_hour->real_9 }}</td>
            <td>{!! $months_hour->getStatus_9() !!}</td>
        </tr>
        @endif
        @if($months_hour->month_10 !== NULL)
        <tr>
            <td>{{$months_hour->sender()->first()->getDistrict->fullname }}</td>
            <td>{{ $months_hour->sender()->first()->fullname}}</td>
            <td>{{ $months_hour->sender()->first()->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->user->fullname}}</td>
            <td>{{ $months_hour->schedule->program->bid->user->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->getClasses() }}</td>
            <td>{{ $months_hour->schedule->program->bid->subject}}</td>
            <td>{{ $months_hour->schedule->program->bid->modul }}</td>
            <td>{{ $months_hour->schedule->program->bid->hours }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_of_education }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_education_implementation }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalPrograms() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalActivities() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataBegin() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataEnd() }}</td>
            <td>{{ $months_hour->schedule->program->bid->content }}</td>

            <td>{{$months_hour->month_10 }}</td>
            <td>{{$months_hour->estimated_10 }}</td>
            <td>{{$months_hour->real_10 }}</td>
            <td>{!! $months_hour->getStatus_10() !!}</td>
        </tr>
        @endif
        @if($months_hour->month_11 !== NULL)
        <tr>
            <td>{{$months_hour->sender()->first()->getDistrict->fullname }}</td>
            <td>{{ $months_hour->sender()->first()->fullname}}</td>
            <td>{{ $months_hour->sender()->first()->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->user->fullname}}</td>
            <td>{{ $months_hour->schedule->program->bid->user->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->getClasses() }}</td>
            <td>{{ $months_hour->schedule->program->bid->subject}}</td>
            <td>{{ $months_hour->schedule->program->bid->modul }}</td>
            <td>{{ $months_hour->schedule->program->bid->hours }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_of_education }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_education_implementation }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalPrograms() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalActivities() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataBegin() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataEnd() }}</td>
            <td>{{ $months_hour->schedule->program->bid->content }}</td>

            <td>{{$months_hour->month_11 }}</td>
            <td>{{$months_hour->estimated_11 }}</td>
            <td>{{$months_hour->real_11 }}</td>
            <td>{!! $months_hour->getStatus_11() !!}</td>
        </tr>
        @endif
        @if($months_hour->month_12 !== NULL)
        <tr>
            <td>{{$months_hour->sender()->first()->getDistrict->fullname }}</td>
            <td>{{ $months_hour->sender()->first()->fullname}}</td>
            <td>{{ $months_hour->sender()->first()->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->user->fullname}}</td>
            <td>{{ $months_hour->schedule->program->bid->user->inn }}</td>

            <td>{{ $months_hour->schedule->program->bid->getClasses() }}</td>
            <td>{{ $months_hour->schedule->program->bid->subject}}</td>
            <td>{{ $months_hour->schedule->program->bid->modul }}</td>
            <td>{{ $months_hour->schedule->program->bid->hours }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_of_education }}</td>
            <td>{{ $months_hour->schedule->program->bid->form_education_implementation }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalPrograms() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getEducationalActivities() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataBegin() }}</td>
            <td>{{ $months_hour->schedule->program->bid->getDataEnd() }}</td>
            <td>{{ $months_hour->schedule->program->bid->content }}</td>

            <td>{{$months_hour->month_12 }}</td>
            <td>{{$months_hour->estimated_12 }}</td>
            <td>{{$months_hour->real_12 }}</td>
            <td>{!! $months_hour->getStatus_12() !!}</td>
        </tr>
        @endif
        @endif
        @endforeach
    </tbody>
</table>

