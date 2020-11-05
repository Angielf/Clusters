@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Региональный координатор</h2>
                    </div>

                    <ul class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Муниципалитет</th>
                                    <th scope="col">Организация</th>

                                    <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                                    <th scope="col">
                                        Форма/условия реализации обучения/ Образовательная программа/деятельность
                                    </th>

                                    <th scope="col">Комментарий</th>
                                    <th scope="col">Программа/ Расписание</th>
                                    <th scope="col">Кол-во учеников/Список</th>
                                    <th scope="col">Договор</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach($bids as $bid)
                                        @if($bid->program->schedule->student->agreement)
                                        <td>{{ $bid->user->getDistrict->fullname }}</td>
                                        <td>{{ $bid->user->fullname }}</td>

                                        <td>
                                            <p>{{ $bid->getClasses() }}</p>
                                            <p>{{ $bid->subject }}</p>
                                            <p>{{ $bid->modul }}</p>
                                            <p>{{ $bid->hours }}</p>
                                        </td>

                                        <td>
                                            <p>{{ $bid->form_of_education }}</p>
                                            <p>{{ $bid->form_education_implementation }}</p>
                                            <p>{{ $bid->getEducationalPrograms() }}</p>
                                            <p>{{ $bid->getEducationalActivities() }}</p>
                                        </td>

                                        <td>{{ $bid->content }}</td>

                                        <td>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <a href="/files/programs/{{ $bid->program->filename }}"
                                                        class="btn btn-outline-success">
                                                        Программа
                                                    </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="/files/schedules/{{ $bid->program->schedule->filename }}"
                                                        class="btn btn-outline-success">
                                                        Расписание
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>

                                        <td>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    {{ $bid->program->schedule->student->students_amount }}
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="/files/students/{{ $bid->program->schedule->student->filename }}"
                                                        class="btn btn-outline-success">
                                                        Список учеников
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>

                                        <td>
                                            <a href="/files/agreements/{{ $bid->program->schedule->student->agreement->filename }}"
                                                class="btn btn-outline-success">
                                                Договор
                                            </a>
                                        </td>
                                        @endif
                                    @endforeach

                                </tbody>
                          </table>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
