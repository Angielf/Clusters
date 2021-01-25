@extends('layouts.app')

@section('content')
@if (Auth::user() && Auth::user()->id == $bid->user->id)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <p><a href="{{ route('home')}}"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться на главную страницу
            </a></p>

            <table class="table table-striped">
                <tbody>
                  <tr>
                    <th scope="row">Класс/группа</th>
                    <td>{{ $bid->getClasses() }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myClass">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Предмет/курс</th>
                    <td>{{ $bid->subject }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#mySubject">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Раздел/модуль</th>
                    <td>{{ $bid->modul }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModul">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Количество часов</th>
                    <td>{{ $bid->hours }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myHours">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Форма обучения</th>
                    <td>{{ $bid->form_of_education }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myFormOfEducation">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Условия реализации обучения</th>
                    <td>{{ $bid->form_education_implementation }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myFormEducationImplementation">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Образовательная программа</th>
                    <td>{{ $bid->getEducationalPrograms() }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myEducationalProgram">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Образовательная деятельность</th>
                    <td>{{ $bid->getEducationalActivities() }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myEducationalActivity">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Начало</th>
                    <td>{{ $bid->getDataBegin() }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myDateBegin">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Конец</th>
                    <td>{{ $bid->getDataEnd() }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myDateEnd">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Комментарий</th>
                    <td>{{ $bid->content }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myContent">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>

                  @if($bid->status === 1)

                  @if(($bid->programs()->sortByDesc('status')->first()) and ($bid->programs()->sortByDesc('status')->first()->status === 1))
                  <tr>
                    <th scope="row">Программа</th>
                    <td>
                        @foreach($bid->programs() as $program)
                            @if($program->status === 1)
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h6 class="card-title">
                                            {{$program->sender()->first()->fullname}}
                                        </h6>
                                        <p>
                                            <a href="/files/programs/{{ $program->filename }}"
                                                class="btn btn-outline-success">
                                                Программа
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @if ($bid->programs()->sortByDesc('status')->first()->schedule === NULL)
                            <p><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteProgram">
                                <i class="far fa-trash-alt"></i> Удалить программу
                            </button></p>

                            <!-- Удалить программу -->
                            <div class="modal fade" id="deleteProgram" tabindex="-1" aria-labelledby="deleteProgramLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteProgramLabel">
                                                {{ $bid->getClasses() }}; {{ $bid->subject }}; {{ $bid->modul }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Вы уверены, что хотите удалить программу?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Закрыть</button>
                                            <form action="{{ action('BidController@back_programs',$bid->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-outline-success btn">
                                                    Да
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                  </tr>
                  @endif

                  @if(($bid->programs()->sortByDesc('status')->first()->schedule) and ($bid->programs()->sortByDesc('status')->first()->schedule->status === 1))
                  <tr>
                    <th scope="row">Расписание</th>
                    <td>
                        <p><a href="/files/schedules/{{ $bid->programs()->sortByDesc('status')->first()->schedule->filename }}"
                            class="btn btn-outline-success">
                            Расписание
                         </a><br></p>
                    </td>
                    <td>
                        @if (($bid->programs()->sortByDesc('status')->first()->schedule->student === NULL) and ($bid->programs()->sortByDesc('status')->first()->schedule->months_hour === NULL) and ($bid->programs()->sortByDesc('status')->first()->schedule->status === 1))
                            <p><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteSchedule">
                                <i class="far fa-trash-alt"></i> Удалить расписание
                            </button></p>

                            <!-- Удалить расписание -->
                            <div class="modal fade" id="deleteSchedule" tabindex="-1" aria-labelledby="deleteScheduleLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteScheduleLabel">
                                                {{ $bid->getClasses() }}; {{ $bid->subject }}; {{ $bid->modul }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                Вы уверены, что хотите удалить расписание?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Закрыть</button>
                                                <form action="{{ action('ScheduleController@delete',$bid->programs()->sortByDesc('status')->first()->schedule->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-outline-success btn">
                                                        Да
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                  </tr>
                  @endif


                  @if(($bid->programs()->sortByDesc('status')->first()->schedule) and ($bid->programs()->sortByDesc('status')->first()->schedule->status === 1) and ($bid->programs()->sortByDesc('status')->first()->schedule->months_hour))
                  <tr>
                    <th scope="row">Кол-во часов по месяцам</th>
                    <td>
                        <p><a href="/months_hours/{{ $bid->programs()->sortByDesc('status')->first()->schedule->months_hour->id }}/update-rez"
                            class="btn btn-outline-info btn">
                                Кол-во часов по месяцам
                        </a><br></p>
                    </td>
                    <td>
                        @if (($bid->programs()->sortByDesc('status')->first()->schedule->status === 1))
                            <p><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteMonthsHour">
                                <i class="far fa-trash-alt"></i> Удалить кол-во часов по месяцам
                            </button></p>

                            <!-- Удалить кол-во часов по месяцам -->
                            <div class="modal fade" id="deleteMonthsHour" tabindex="-1" aria-labelledby="deleteMonthsHourLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteMonthsHourLabel">
                                                {{ $bid->getClasses() }}; {{ $bid->subject }}; {{ $bid->modul }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                Вы уверены, что хотите удалить кол-во часов по месяцам?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Закрыть</button>
                                                <form action="{{ action('MonthsHourController@delete',$bid->programs()->sortByDesc('status')->first()->schedule->months_hour->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-outline-success btn">
                                                        Да
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                  </tr>
                  @endif


                  @if(($bid->programs()->sortByDesc('status')->first()->schedule) and ($bid->programs()->sortByDesc('status')->first()->schedule->status === 1) and ($bid->programs()->sortByDesc('status')->first()->schedule->student))
                  <tr>
                    <th scope="row">Кол-во/ Список учеников</th>
                    <td>
                        <p>{{ $bid->programs()->sortByDesc('status')->first()->schedule->student->students_amount }}</p>
                        <p><a href="/files/students/{{ $bid->programs()->sortByDesc('status')->first()->schedule->student->filename }}"
                            class="btn btn-outline-success">
                            Список учеников
                        </a><br></p>
                    </td>
                    <td>
                        @if ($bid->programs()->sortByDesc('status')->first()->schedule->student->agreement === NULL)
                            <p><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteStudents">
                                <i class="far fa-trash-alt"></i> Удалить список учеников
                            </button></p>

                            <!-- Удалить список учеников и их количество -->
                            <div class="modal fade" id="deleteStudents" tabindex="-1" aria-labelledby="deleteStudentsLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteStudentsLabel">
                                                {{ $bid->getClasses() }}; {{ $bid->subject }}; {{ $bid->modul }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Вы уверены, что хотите удалить список учеников и их количество?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Закрыть</button>
                                                <form action="{{ action('StudentController@delete',$bid->programs()->sortByDesc('status')->first()->schedule->student->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-outline-success btn">
                                                        Да
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                  </tr>
                  @endif


                  @if(($bid->programs()->sortByDesc('status')->first()->schedule) and ($bid->programs()->sortByDesc('status')->first()->schedule->status === 1) and ($bid->programs()->sortByDesc('status')->first()->schedule->student) and ($bid->programs()->sortByDesc('status')->first()->schedule->student->agreement))
                  <tr>
                    <th scope="row">Договор</th>
                    <td>
                        <a href="/files/agreements/{{ $bid->programs()->sortByDesc('status')->first()->schedule->student->agreement->filename }}"
                            class="btn btn-outline-success">
                            Договор
                        </a>
                    </td>
                    <td>
                        <p><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteAgreement">
                            <i class="far fa-trash-alt"></i> Удалить договор
                        </button></p>

                        <!-- Удалить Договор -->
                        <div class="modal fade" id="deleteAgreement" tabindex="-1" aria-labelledby="deleteAgreementLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteAgreementLabel">
                                            {{ $bid->getClasses() }}; {{ $bid->subject }}; {{ $bid->modul }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Вы уверены, что хотите удалить договор?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Закрыть</button>
                                        <form action="{{ action('AgreementController@delete',$bid->programs()->sortByDesc('status')->first()->schedule->student->agreement->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-outline-success btn">
                                                Да
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                  </tr>
                  @endif

                  @endif
                </tbody>
            </table>

            <p><a href="{{ route('home')}}"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться на главную страницу
            </a></p>


            <!-- Модальное окно Класс/группа-->
            <div class="modal fade" id="myClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabelClass" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelClass">Класс/группа</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('BidController@update_class', $bid->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="class[]" id='selectid'>
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="смешанная группа" id="smesh">смешанная группа</option>
                                    </select>
                                </div>

                                <ul class="list-group" id="mix"
                                style="margin:0 auto; display:none;"
                                >
                                    <label for="class">Выберите классы для смешанной группы:</label>
                                    <li class="list-group-item">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="1">
                                            <label class="form-check-label">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="2">
                                            <label class="form-check-label">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="3">
                                            <label class="form-check-label">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="4">
                                            <label class="form-check-label">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="5">
                                            <label class="form-check-label">5</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="6">
                                            <label class="form-check-label">6</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="7">
                                            <label class="form-check-label">7</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="8">
                                            <label class="form-check-label">8</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="9">
                                            <label class="form-check-label">9</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="10">
                                            <label class="form-check-label">10</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="11">
                                            <label class="form-check-label">11</label>
                                        </div>
                                    </li>
                                </ul>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Класс/группа --}}


            <!-- Модальное окно Предмет/курс-->
            <div class="modal fade" id="mySubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabelSubject" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelSubject">Предмет/курс</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('BidController@update_subject', $bid->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="subject" id="subject" class="form-control"" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Предмет/курс --}}


            <!-- Модальное окно Раздел/модуль-->
            <div class="modal fade" id="myModul" tabindex="-1" role="dialog" aria-labelledby="myModalLabelModul" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelModul">Раздел/модуль</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('BidController@update_modul', $bid->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="modul" id="modul" class="form-control"" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Раздел/модуль --}}

            <!-- Модальное окно Количество часов-->
            <div class="modal fade" id="myHours" tabindex="-1" role="dialog" aria-labelledby="myModalLabelHours" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelHours">Количество часов</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('BidController@update_hours', $bid->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="hours" id="hours" class="form-control"" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Количество часов --}}

            <!-- Модальное окно Форма обучения-->
            <div class="modal fade" id="myFormOfEducation" tabindex="-1" role="dialog" aria-labelledby="myFormOfEducation" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelFormOfEducation">Форма обучения</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('BidController@update_form_of_education', $bid->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="form_of_education">
                                        <option value=""></option>
                                        <option value="очная">очная</option>
                                        <option value="очно-заочная">очно-заочная</option>
                                        <option value="заочная">заочная</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Форма обучения --}}


            <!-- Модальное окно Условия реализации обучения-->
            <div class="modal fade" id="myFormEducationImplementation" tabindex="-1" role="dialog" aria-labelledby="myFormEducationImplementation" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelFormEducationImplementation">Условия реализации обучения</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('BidController@update_form_education_implementation', $bid->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="form_education_implementation">
                                        <option value=""></option>
                                        <option value="с использование дистанционных образовательных технологий, электронного обучения">с использование дистанционных образовательных технологий, электронного обучения</option>

                                        <option value="трансфер детей до организации">трансфер детей до организации</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Условия реализации обучения --}}


            <!-- Модальное окно Образовательная программа-->
            <div class="modal fade" id="myEducationalProgram" tabindex="-1" role="dialog" aria-labelledby="myEducationalProgram" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelEducationalProgram">Образовательная программа</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('BidController@update_educational_program', $bid->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="educational_program[]">
                                        <option value=""></option>
                                        <option value="основная">основная</option>

                                        <option value="дополнительная">дополнительная</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Образовательная программа --}}


            <!-- Модальное окно Образовательная деятельность-->
            <div class="modal fade" id="myEducationalActivity" tabindex="-1" role="dialog" aria-labelledby="myEducationalActivity" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelEducationalActivity">Образовательная деятельность</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('BidController@update_educational_activity', $bid->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="educational_activity[]">
                                        <option value=""></option>
                                        <option value="урочная">урочная</option>

                                        <option value="внеурочная">внеурочная</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Образовательная деятельность --}}


            <!-- Модальное окно Начало-->
            <div class="modal fade" id="myDateBegin" tabindex="-1" role="dialog" aria-labelledby="myDateBegin" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelDateBegin">Начало</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('BidController@update_date_begin', $bid->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="date" class="form-control" data-date-format="dd/mm/yyyy" name="date_begin"/>
                                    <small class="form-text text-muted">нажмите на значок справа</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Начало --}}


            <!-- Модальное окно Конец-->
            <div class="modal fade" id="myDateEnd" tabindex="-1" role="dialog" aria-labelledby="myDateEnd" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelDateEnd">Конец</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('BidController@update_date_end', $bid->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="date" class="form-control" data-date-format="dd/mm/yyyy" name="date_end"/>
                                    <small class="form-text text-muted">нажмите на значок справа</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Конец --}}


            <!-- Модальное окно Комментарий-->
            <div class="modal fade" id="myContent" tabindex="-1" role="dialog" aria-labelledby="myContent" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelContent">Комментарий</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('BidController@update_content', $bid->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="content"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Комментарий --}}



        </div>
    </div>
</div>

<script>
    $(function() {
        $("#selectid").change(function() {
            if ($("#smesh").is(":selected")) {
                $("#mix").show();
            }
            else {
                $("#mix").hide();
            }
        }).trigger('change');
    });
</script>
@endif
@endsection
