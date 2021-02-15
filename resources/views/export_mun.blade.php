<table>
    <thead>
        <tr>
            <th>Организация реципиент</th>
            <th>ИНН реципиента</th>

            <th>Базовая организация</th>
            <th>ИНН базовой организации</th>

            <th>Класс</th>
            <th>Предмет(курс)</th>
            <th>Раздел(модуль)</th>
            <th>Кол-во часов</th>

            <th>Формареализации обучения</th>
            <th>Условия реализации обучения</th>
            <th>Образовательная программа</th>
            <th>Образовательная деятельность</th>
            <th>Комментарий</th>

            <th>Начало</th>
            <th>Конец</th>

            <th>Программа</th>
            <th>Расписание</th>
            <th>Кол-во учеников</th>
            <th>Список</th>
            <th>Договор</th>
        </tr>
        </thead>

        <tbody>
            @foreach($bids as $bid)
            @if($bid->user->district == Auth::user()->getDistrict->id)
                <tr>
                        <td>
                            {{ $bid->user->fullname }}
                        </td>
                        <td>
                            {{ $bid->user->inn }}
                        </td>
                        <td>
                            @if($bid->status === 1)
                            {{ $bid->programs()->sortByDesc('status')->first()->sender()->first()->fullname}}
                            @endif
                        </td>
                        <td>
                            @if($bid->status === 1)
                            {{ $bid->programs()->sortByDesc('status')->first()->sender()->first()->inn}}
                            @endif
                        </td>

                        <td>{{ $bid->getClasses() }}</td>
                        <td>{{ $bid->subject }}</td>
                        <td>{{ $bid->modul }}</td>
                        <td>{{ $bid->hours }}</td>

                        <td>{{ $bid->form_of_education }}</td>
                        <td>{{ $bid->form_education_implementation }}</td>
                        <td>{{ $bid->getEducationalPrograms() }}</td>
                        <td>{{ $bid->getEducationalActivities()}}</td>
                        <td>{{ $bid->content }}</td>

                        <td>{{ $bid->getDataBegin() }}</td>
                        <td>{{ $bid->getDataEnd() }}</td>

                        <td>
                            @if($bid->status === 1)
                            {{ $bid->programs()->sortByDesc('status')->first()->filename }}
                            @endif
                        </td>
                        <td>
                            @if(($bid->status === 1) and ($bid->programs()->sortByDesc('status')->first()->schedule) and ($bid->programs()->sortByDesc('status')->first()->schedule->status === 1))
                                {{ $bid->programs()->sortByDesc('status')->first()->schedule->filename }}
                            @endif
                        </td>

                        <td>
                            @if (($bid->status === 1) and ($bid->programs()->sortByDesc('status')->first()->schedule) and ($bid->programs()->sortByDesc('status')->first()->schedule->status === 1)
                            and ($bid->programs()->sortByDesc('status')->first()->schedule->student))
                                {{$bid->programs()->sortByDesc('status')->first()->schedule->student->students_amount}}
                            @endif
                        </td>
                        <td>
                            @if (($bid->status === 1) and ($bid->programs()->sortByDesc('status')->first()->schedule) and ($bid->programs()->sortByDesc('status')->first()->schedule->status === 1)
                            and ($bid->programs()->sortByDesc('status')->first()->schedule->student))
                                {{ $bid->programs()->sortByDesc('status')->first()->schedule->student->filename }}
                            @endif
                        </td>

                        <td>
                            @if (($bid->status === 1) and ($bid->programs()->sortByDesc('status')->first()->schedule) and ($bid->programs()->sortByDesc('status')->first()->schedule->status === 1)
                            and ($bid->programs()->sortByDesc('status')->first()->schedule->student) and ($bid->programs()->sortByDesc('status')->first()->schedule->student->agreement))
                                {{ $bid->programs()->sortByDesc('status')->first()->schedule->student->agreement->filename }}
                            @endif
                        </td>

                    </tr>

            @endif
            @endforeach


        </tbody>
  </table>
