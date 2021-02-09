<table class="table">
    <thead>
        <tr>
            <th scope="col">Организация реципиент</th>
            <th scope="col">ИНН реципиента</th>
            <th scope="col">Базовая организация</th>
            <th scope="col">ИНН базовой организации</th>
            <th scope="col">Класс</th>
            <th scope="col">Предмет(курс)</th>
            <th scope="col">Раздел(модуль)</th>
            <th scope="col">Кол-во часов</th>
            <th scope="col">Форма реализации обучения</th>
            <th scope="col">Условия реализации обучения</th>
            <th scope="col">Образовательная программа</th>
            <th scope="col">Образовательная деятельность</th>
            <th scope="col">Комментарий</th>
            <th scope="col">Начало</th>
            <th scope="col">Конец</th>
            <th scope="col">Программа</th>
            <th scope="col">Расписание</th>
            <th scope="col">Кол-во учеников</th>
            <th scope="col">Список учеников</th>
            <th scope="col">Договор</th>
        </tr>
    </thead>

    <tbody id="table4">
        @foreach($selected_programs as $selected_program)
        @if(($selected_program->user->district == $user->getDistrict->id))
            <tr>
                <td>{{ $selected_program->user->fullname }}</td>
                <td>{{ $selected_program->user->inn }}</td>

                <td>{{ $selected_program->proposed_program->user->fullname}}</td>
                <td>{{ $selected_program->proposed_program->user->inn}}</td>

                <td>{{ $selected_program->proposed_program->getClasses() }}</td>
                <td>{{ $selected_program->proposed_program->subject }}</td>
                <td>{{ $selected_program->proposed_program->modul }}</td>
                <td>{{ $selected_program->proposed_program->hours }}</td>

                <td>{{ $selected_program->proposed_program->form_of_education }} </td>
                <td>{{ $selected_program->proposed_program->form_education_implementation }}</td>
                <td>{{ $selected_program->proposed_program->educational_program }}</td>
                <td>{{ $selected_program->proposed_program->educational_activity }}</td>
                <td>{{ $selected_program->proposed_program->content }}</td>

                <td>{{ $selected_program->proposed_program->getDataBegin() }}</td>
                <td>{{ $selected_program->proposed_program->getDataEnd() }}</td>

                <td>{{ $selected_program->proposed_program->filename }}</td>

                @if(($selected_program->selected_schedule) and ($selected_program->selected_schedule->status === 1))
                    <td>{{ $selected_program->selected_schedule->filename }}</td>
                @else
                    <td></td>
                @endif

                @if (($selected_program->selected_schedule) and ($selected_program->selected_schedule->status === 1)
                    and ($selected_program->selected_schedule->selected_student))
                    <td>{{$selected_program->selected_schedule->selected_student->students_amount}}</td>
                    <td>{{ $selected_program->selected_schedule->selected_student->filename }}</td>
                @else
                    <td></td>
                    <td></td>
                @endif

                @if (($selected_program->selected_schedule) and ($selected_program->selected_schedule->status === 1)
                    and ($selected_program->selected_schedule->selected_student) and ($selected_program->selected_schedule->selected_student->selected_agreement))
                    <td>{{ $selected_program->selected_schedule->selected_student->selected_agreement->filename }}</td>
                @else
                    <td></td>
                @endif
            </tr>
        @endif
        @endforeach


    </tbody>
  </table>
