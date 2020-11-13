@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">


                    {{-- <form method="post" action="/instruction/add" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="instruction">
                                <label class="custom-file-label">Загрузить</label>
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form> --}}


                    <div class="card-header">
                        <h2>Региональный координатор</h2>

                        {{-- <a class="btn btn-outline-dark" href="{{ route('export') }}">Excel</a> --}}

                        <ul class="list-group">
                            <li class="list-group-item">
                                Заявки, у которых уже есть договор:
                                <a class="btn btn-outline-dark" href="http://127.0.0.1:8000/download_excel.php">Excel</a>
                            </li>
                        </ul>
                    </div>

                    <ul class="nav nav-tabs">
                        <!-- Первая вкладка (активная) -->
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#bids_with_programs">
                                Заявки, у которых уже есть утверждённая программа
                            </a>
                        </li>
                        <!-- Вторая вкладка -->
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#other">
                                Остальные
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                    <div class="tab-pane fade show active" id="bids_with_programs">
                    <ul class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Муниципалитет</th>
                                    <th scope="col">Организация реципиент</th>
                                    <th scope="col">Базовая организация</th>

                                    <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                                    <th scope="col">
                                        Форма/условия реализации обучения/ Образовательная программа/деятельность/ Комментарий
                                    </th>

                                    {{-- <th scope="col">Комментарий</th> --}}
                                    <th scope="col">Программа/ Расписание</th>
                                    <th scope="col">Кол-во учеников/Список</th>
                                    <th scope="col">Договор</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach($bids as $bid)
                                        @if(($bid->status === 1))
                                            <tr>
                                                <td>{{ $bid->user->getDistrict->fullname }}</td>
                                                <td>{{ $bid->user->fullname }}</td>

                                                <td>{{ $bid->program->sender()->first()->fullname }}</td>

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
                                                    <p>{{ $bid->content }}</p>
                                                </td>

                                                {{-- <td>{{ $bid->content }}</td> --}}

                                                <td>
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <a href="/files/programs/{{ $bid->program->filename }}"
                                                                class="btn btn-outline-success">
                                                                Программа
                                                            </a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            @if(($bid->program->schedule) and ($bid->program->schedule->status === 1))
                                                                <a href="/files/schedules/{{ $bid->program->schedule->filename }}"
                                                                    class="btn btn-outline-success">
                                                                    Расписание
                                                                </a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </td>

                                                @if(($bid->program->schedule) and ($bid->program->schedule->status === 1))
                                                    <td>
                                                        {{-- @if($bid->program->schedule !== 1)
                                                            <p></p> --}}
                                                        @if($bid->program->schedule->student)
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

                                                            <td>
                                                                @if ($bid->program->schedule->student->agreement)
                                                                    <a href="/files/agreements/{{ $bid->program->schedule->student->agreement->filename }}"
                                                                    class="btn btn-outline-success">
                                                                        Договор
                                                                    </a>
                                                                @else
                                                                    <p></p>
                                                                @endif


                                                            </td>
                                                        @else
                                                            <p></p>
                                                        @endif
                                                    </td>

                                                @endif

                                            <tr>


                                        @endif
                                    @endforeach


                                </tbody>
                          </table>
                    </ul>
                    </div>

                    <div class="tab-pane fade" id="other">
                        <ul class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Муниципалитет</th>
                                        <th scope="col">Организация реципиент</th>

                                        <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                                        <th scope="col">
                                            Форма/условия реализации обучения/ Образовательная программа/деятельность/ Комментарий
                                        </th>

                                        {{-- <th scope="col">Программы</th> --}}
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($bids as $bid)
                                            @if(($bid->status === 0) or ($bid->status === 9))
                                            <tr>
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
                                                    <p>{{ $bid->content }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                              </table>
                        </ul>
                    </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
