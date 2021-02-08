<table class="table">
    <thead>
        <tr>
            <th scope="col">Муниципалитет</th>
            <th scope="col">Организация</th>
            <th scope="col">ИНН</th>
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
        </tr>
    </thead>

    <tbody>
        @foreach($proposed_programs_all as $proposed)
            <tr>
                <td>{{ $proposed->user->getDistrict->fullname }}</td>
                <td>{{ $proposed->user->fullname }}</td>
                <td>{{ $proposed->user->inn }}</td>

                <td>{{ $proposed->getClasses() }}</td>
                <td>{{ $proposed->subject }}</td>
                <td>{{ $proposed->modul }}</td>
                <td>{{ $proposed->hours }}</td>

                <td>{{ $proposed->form_of_education }}</td>
                <td>{{ $proposed->form_education_implementation }}</td>
                <td>{{ $proposed->educational_program  }}</td>
                <td>{{ $proposed->educational_activity }}</td>
                <td>{{ $proposed->content }}</td>

                <td>{{ $proposed->getDataBegin() }}</td>
                <td>{{ $proposed->getDataEnd() }}</td>

                <td>{{ $proposed->filename }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
