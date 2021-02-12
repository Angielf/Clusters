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
        @foreach($selected_months_hours as $selected_months_hour)
        @if($selected_months_hour->selected_schedule->selected_program->proposed_program->user->district == Auth::user()->getDistrict->id)
        @if($selected_months_hour->month_1 !== NULL)
        <tr>
            <td>{{$selected_months_hour->sender()->first()->fullname }}</td>
            <td>{{ $selected_months_hour->sender()->first()->fullname}}</td>
            <td>{{ $selected_months_hour->sender()->first()->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->fullname}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getClasses() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->subject}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->modul }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->hours }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_of_education }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_education_implementation }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_program }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_activity }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataBegin() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataEnd() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->content }}</td>

            <td>{{$selected_months_hour->month_1 }}</td>
            <td>{{$selected_months_hour->estimated_1 }}</td>
            <td>{{$selected_months_hour->real_1 }}</td>
            <td>{!! $selected_months_hour->getStatus_1() !!}</td>
        </tr>
        @endif
        @if($selected_months_hour->month_2 !== NULL)
        <tr>
            <td>{{$selected_months_hour->sender()->first()->fullname }}</td>
            <td>{{ $selected_months_hour->sender()->first()->fullname}}</td>
            <td>{{ $selected_months_hour->sender()->first()->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->fullname}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getClasses() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->subject}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->modul }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->hours }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_of_education }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_education_implementation }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_program }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_activity }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataBegin() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataEnd() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->content }}</td>

            <td>{{$selected_months_hour->month_2 }}</td>
            <td>{{$selected_months_hour->estimated_2 }}</td>
            <td>{{$selected_months_hour->real_2 }}</td>
            <td>{!! $selected_months_hour->getStatus_2() !!}</td>
        </tr>
        @endif
        @if($selected_months_hour->month_3 !== NULL)
        <tr>
            <td>{{$selected_months_hour->sender()->first()->fullname }}</td>
            <td>{{ $selected_months_hour->sender()->first()->fullname}}</td>
            <td>{{ $selected_months_hour->sender()->first()->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->fullname}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getClasses() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->subject}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->modul }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->hours }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_of_education }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_education_implementation }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_program }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_activity }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataBegin() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataEnd() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->content }}</td>

            <td>{{$selected_months_hour->month_3 }}</td>
            <td>{{$selected_months_hour->estimated_3 }}</td>
            <td>{{$selected_months_hour->real_3 }}</td>
            <td>{!! $selected_months_hour->getStatus_3() !!}</td>
        </tr>
        @endif
        @if($selected_months_hour->month_4 !== NULL)
        <tr>
            <td>{{$selected_months_hour->sender()->first()->fullname }}</td>
            <td>{{ $selected_months_hour->sender()->first()->fullname}}</td>
            <td>{{ $selected_months_hour->sender()->first()->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->fullname}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getClasses() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->subject}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->modul }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->hours }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_of_education }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_education_implementation }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_program }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_activity }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataBegin() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataEnd() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->content }}</td>

            <td>{{$selected_months_hour->month_4 }}</td>
            <td>{{$selected_months_hour->estimated_4 }}</td>
            <td>{{$selected_months_hour->real_4 }}</td>
            <td>{!! $selected_months_hour->getStatus_4() !!}</td>
        </tr>
        @endif
        @if($selected_months_hour->month_5 !== NULL)
        <tr>
            <td>{{$selected_months_hour->sender()->first()->fullname }}</td>
            <td>{{ $selected_months_hour->sender()->first()->fullname}}</td>
            <td>{{ $selected_months_hour->sender()->first()->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->fullname}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getClasses() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->subject}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->modul }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->hours }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_of_education }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_education_implementation }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_program }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_activity }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataBegin() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataEnd() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->content }}</td>

            <td>{{$selected_months_hour->month_5 }}</td>
            <td>{{$selected_months_hour->estimated_5 }}</td>
            <td>{{$selected_months_hour->real_5 }}</td>
            <td>{!! $selected_months_hour->getStatus_5() !!}</td>
        </tr>
        @endif
        @if($selected_months_hour->month_6 !== NULL)
        <tr>
            <td>{{$selected_months_hour->sender()->first()->fullname }}</td>
            <td>{{ $selected_months_hour->sender()->first()->fullname}}</td>
            <td>{{ $selected_months_hour->sender()->first()->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->fullname}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getClasses() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->subject}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->modul }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->hours }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_of_education }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_education_implementation }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_program }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_activity }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataBegin() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataEnd() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->content }}</td>

            <td>{{$selected_months_hour->month_6 }}</td>
            <td>{{$selected_months_hour->estimated_6 }}</td>
            <td>{{$selected_months_hour->real_6 }}</td>
            <td>{!! $selected_months_hour->getStatus_6() !!}</td>
        </tr>
        @endif
        @if($selected_months_hour->month_7 !== NULL)
        <tr>
            <td>{{$selected_months_hour->sender()->first()->fullname }}</td>
            <td>{{ $selected_months_hour->sender()->first()->fullname}}</td>
            <td>{{ $selected_months_hour->sender()->first()->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->fullname}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getClasses() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->subject}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->modul }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->hours }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_of_education }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_education_implementation }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_program }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_activity }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataBegin() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataEnd() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->content }}</td>

            <td>{{$selected_months_hour->month_7 }}</td>
            <td>{{$selected_months_hour->estimated_7 }}</td>
            <td>{{$selected_months_hour->real_7 }}</td>
            <td>{!! $selected_months_hour->getStatus_7() !!}</td>
        </tr>
        @endif
        @if($selected_months_hour->month_8 !== NULL)
        <tr>
            <td>{{$selected_months_hour->sender()->first()->fullname }}</td>
            <td>{{ $selected_months_hour->sender()->first()->fullname}}</td>
            <td>{{ $selected_months_hour->sender()->first()->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->fullname}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getClasses() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->subject}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->modul }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->hours }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_of_education }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_education_implementation }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_program }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_activity }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataBegin() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataEnd() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->content }}</td>

            <td>{{$selected_months_hour->month_8 }}</td>
            <td>{{$selected_months_hour->estimated_8 }}</td>
            <td>{{$selected_months_hour->real_8 }}</td>
            <td>{!! $selected_months_hour->getStatus_8() !!}</td>
        </tr>
        @endif
        @if($selected_months_hour->month_9 !== NULL)
        <tr>
            <td>{{$selected_months_hour->sender()->first()->fullname }}</td>
            <td>{{ $selected_months_hour->sender()->first()->fullname}}</td>
            <td>{{ $selected_months_hour->sender()->first()->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->fullname}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getClasses() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->subject}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->modul }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->hours }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_of_education }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_education_implementation }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_program }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_activity }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataBegin() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataEnd() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->content }}</td>

            <td>{{$selected_months_hour->month_9 }}</td>
            <td>{{$selected_months_hour->estimated_9 }}</td>
            <td>{{$selected_months_hour->real_9 }}</td>
            <td>{!! $selected_months_hour->getStatus_9() !!}</td>
        </tr>
        @endif
        @if($selected_months_hour->month_10 !== NULL)
        <tr>
            <td>{{$selected_months_hour->sender()->first()->fullname }}</td>
            <td>{{ $selected_months_hour->sender()->first()->fullname}}</td>
            <td>{{ $selected_months_hour->sender()->first()->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->fullname}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getClasses() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->subject}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->modul }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->hours }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_of_education }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_education_implementation }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_program }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_activity }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataBegin() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataEnd() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->content }}</td>

            <td>{{$selected_months_hour->month_10 }}</td>
            <td>{{$selected_months_hour->estimated_10 }}</td>
            <td>{{$selected_months_hour->real_10 }}</td>
            <td>{!! $selected_months_hour->getStatus_10() !!}</td>
        </tr>
        @endif
        @if($selected_months_hour->month_11 !== NULL)
        <tr>
            <td>{{$selected_months_hour->sender()->first()->fullname }}</td>
            <td>{{ $selected_months_hour->sender()->first()->fullname}}</td>
            <td>{{ $selected_months_hour->sender()->first()->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->fullname}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getClasses() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->subject}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->modul }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->hours }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_of_education }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_education_implementation }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_program }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_activity }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataBegin() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataEnd() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->content }}</td>

            <td>{{$selected_months_hour->month_11 }}</td>
            <td>{{$selected_months_hour->estimated_11 }}</td>
            <td>{{$selected_months_hour->real_11 }}</td>
            <td>{!! $selected_months_hour->getStatus_11() !!}</td>
        </tr>
        @endif
        @if($selected_months_hour->month_12 !== NULL)
        <tr>
            <td>{{$selected_months_hour->sender()->first()->fullname }}</td>
            <td>{{ $selected_months_hour->sender()->first()->fullname}}</td>
            <td>{{ $selected_months_hour->sender()->first()->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->fullname}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->user->inn }}</td>

            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getClasses() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->subject}}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->modul }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->hours }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_of_education }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->form_education_implementation }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_program }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->educational_activity }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataBegin() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->getDataEnd() }}</td>
            <td>{{ $selected_months_hour->selected_schedule->selected_program->proposed_program->content }}</td>

            <td>{{$selected_months_hour->month_12 }}</td>
            <td>{{$selected_months_hour->estimated_12 }}</td>
            <td>{{$selected_months_hour->real_12 }}</td>
            <td>{!! $selected_months_hour->getStatus_12() !!}</td>
        </tr>
        @endif
        @endif
        @endforeach

    </tbody>
</table>
