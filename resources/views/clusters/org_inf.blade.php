@extends('layouts.app')

@section('content')
@if (Auth::user() && (Auth::user()->status == 1 || Auth::user()->status == 10 || Auth::user()->id == $user_org->id))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if(Auth::user()->status == 1)
            <p><a href="{{ route('org_list')}}"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться к списку организаций Воронежской области
            </a></p>
            @elseif(Auth::user()->status == 10)
            <p><a href="/users/{{ Auth::user()->getDistrict->id }}/org-list-mun"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться к списку организаций муниципалитета
            </a></p>
            @elseif(Auth::user()->id == $user_org->id)
            <p><a href="{{ route('home')}}"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться на главную страницу
            </a></p>
            @endif

            <table class="table table-striped table-bordered">
                <tbody>
                    @if(Auth::user()->id != $user_org->id)
                  <tr>
                    <th scope="row">id</th>
                    <td>{{ $user_org->id }}</td>
                    <td></td>
                  </tr>
                  @endif
                  <tr>
                    <th scope="row">Район</th>
                    <td>{{ $user_org->getDistrict->fullname }}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Организация</th>
                    <td>{{ $user_org->fullname }}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">ИНН</th>
                    <td>{{ $user_org->inn }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myInn">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">Адрес</th>
                    <td>{{ $user_org->address }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myAdd">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Телефон</th>
                    <td>{{ $user_org->tel }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myTel">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Почта</th>
                    <td><a href="mailto:{{ $user_org->email_real }}">{{ $user_org->email_real }}</a></td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myEmail">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Сайт</th>
                    <td><a href="http://{{ $user_org->website }}" target="_blank">{{ $user_org->website }}</a></td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myWeb">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Кол-во заявок</th>
                    <td>{{ $user_org->amount_of_bids() }}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Кол-во одобренных программ</th>
                    <td>{{ $user_org->amount_of_programs_1() }}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Кол-во предложенных программ</th>
                    <td>{{ $user_org->amount_of_proposed_programs() }}</td>
                    <td></td>
                  </tr>
                </tbody>
            </table>
            <br/>

            <!-- Модальное окно inn-->
            <div class="modal fade" id="myInn" tabindex="-1" role="dialog" aria-labelledby="myModalLabelInn" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelInn">ИНН {{ $user_org->fullname }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('UserController@update_inn', $user_org->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="inn" id="inn" class="form-control" />
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
            {{-- Конец окна inn --}}

            <!-- Модальное окно Add-->
            <div class="modal fade" id="myAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAdd" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelAdd">Адрес {{ $user_org->fullname }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('UserController@update_add', $user_org->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="add" id="add" rows="3"></textarea>
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
            {{-- Конец окна Add --}}

            <!-- Модальное окно Tel-->
            <div class="modal fade" id="myTel" tabindex="-1" role="dialog" aria-labelledby="myModalLabelTel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelTel">Телефон {{ $user_org->fullname }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('UserController@update_tel', $user_org->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="tel" id="tel" rows="3"></textarea>
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
            {{-- Конец окна Tel --}}

            <!-- Модальное окно Email-->
            <div class="modal fade" id="myEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEmail" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelEmail">Почта {{ $user_org->fullname }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('UserController@update_email_real', $user_org->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email_real" id="email_real" class="form-control" />
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
            {{-- Конец окна Email --}}

            <!-- Модальное окно Web-->
            <div class="modal fade" id="myWeb" tabindex="-1" role="dialog" aria-labelledby="myModalLabelWeb" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelWeb">Сайт {{ $user_org->fullname }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('UserController@update_web', $user_org->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="website" id="website" class="form-control" />
                                    <small class="form-text text-muted">Без http:// или https://</small>
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
            {{-- Конец окна Web --}}


            <h5 align="center">Заявки на дефицит</h5>
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Базовая организация</th>

                        <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                        <th scope="col">
                            Форма/условия реализации обучения/ Образовательная программа/деятельность/ Комментарий
                        </th>

                        <th scope="col">
                            Даты
                        </th>

                        <th scope="col">Программа/ Расписание</th>
                        <th scope="col">Кол-во учеников/Список</th>
                        <th scope="col">Договор</th>
                    </tr>
                    </thead>

                    <tbody id="table1">
                        @foreach($user_org->bids() as $bid)
                            @if(($bid->status === 1))
                                <tr>
                                    <td>
                                        {{ $bid->programs()->sortByDesc('status')->first()->sender()->first()->fullname}}
                                        @if (Auth::user()->status == 1 || Auth::user()->status == 10)
                                        <p><a class="btn btn-outline-dark" href="/users/{{ $bid->programs()->sortByDesc('status')->first()->sender()->first()->id }}/show-org">Информация</a></p>
                                        @elseif(Auth::user()->id == $user_org->id)
                                        <p><a class="btn btn-outline-dark" href="/users/{{ $bid->programs()->sortByDesc('status')->first()->sender()->first()->id }}/about-org">Сведения</a></p>
                                        @endif
                                    </td>

                                    <td>
                                        <ul class="list-group" id="ul1">
                                            <li class="list-group-item">{{ $bid->getClasses() }}</li>
                                            <li class="list-group-item">{{ $bid->subject }}</li>
                                            <li class="list-group-item">{{ $bid->modul }}</li>
                                            <li class="list-group-item">{{ $bid->hours }}</li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-group" id="ul2">
                                            <li class="list-group-item">{{ $bid->form_of_education }} </li>
                                            <li class="list-group-item">{{ $bid->form_education_implementation }}</li>
                                            <li class="list-group-item">{{ $bid->getEducationalPrograms() }}</li>
                                            <li class="list-group-item">{{ $bid->getEducationalActivities() }}</li>
                                            <li class="list-group-item">{{ $bid->content }}</li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{ $bid->getDataBegin() }} </li>
                                            <li class="list-group-item">{{ $bid->getDataEnd() }}</li>
                                        </ul>
                                    </td>


                                    <td>
                                        <li class="list-group-item">
                                            <a href="/files/programs/{{ $bid->programs()->sortByDesc('status')->first()->filename }}"
                                                class="btn btn-outline-success">
                                                Программа
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            @if(($bid->programs()->sortByDesc('status')->first()->schedule) and ($bid->programs()->sortByDesc('status')->first()->schedule->status === 1))
                                                <a href="/files/schedules/{{ $bid->programs()->sortByDesc('status')->first()->schedule->filename }}"
                                                    class="btn btn-outline-success">
                                                    Расписание
                                                </a>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            @if(($bid->programs()->sortByDesc('status')->first()->schedule) and ($bid->programs()->sortByDesc('status')->first()->schedule->status === 1) and ($bid->programs()->sortByDesc('status')->first()->schedule->months_hour))
                                                <a href="/months_hours/{{ $bid->programs()->sortByDesc('status')->first()->schedule->months_hour->id }}/inf"
                                                    class="btn btn-outline-success">
                                                        Кол-во часов по месяцам
                                                </a>
                                            @endif
                                        </li>

                                    </td>

                                    <td>
                                        @if (($bid->programs()->sortByDesc('status')->first()->schedule) and ($bid->programs()->sortByDesc('status')->first()->schedule->status === 1)
                                        and ($bid->programs()->sortByDesc('status')->first()->schedule->student))
                                            <li class="list-group-item">
                                                {{$bid->programs()->sortByDesc('status')->first()->schedule->student->students_amount}}
                                            </li>
                                            <li class="list-group-item">
                                                <a href="/files/students/{{ $bid->programs()->sortByDesc('status')->first()->schedule->student->filename }}"
                                                    class="btn btn-outline-success">
                                                    Список учеников
                                                </a>
                                            </li>
                                        @endif
                                    </td>

                                    <td>
                                        @if (($bid->programs()->sortByDesc('status')->first()->schedule) and ($bid->programs()->sortByDesc('status')->first()->schedule->status === 1)
                                        and ($bid->programs()->sortByDesc('status')->first()->schedule->student) and ($bid->programs()->sortByDesc('status')->first()->schedule->student->agreement))
                                            <li class="list-group-item">
                                                <a href="/files/agreements/{{ $bid->programs()->sortByDesc('status')->first()->schedule->student->agreement->filename }}"
                                                    class="btn btn-outline-success">
                                                        Договор
                                                </a>
                                            </li>
                                        @endif
                                    </td>
                                <tr>
                            @endif

                            @if(($bid->status === 0) or ($bid->status === 9))
                                <tr>
                                    <td></td>
                                    <td>
                                        <ul class="list-group" id="ul3">
                                            <li class="list-group-item">{{ $bid->getClasses() }}</li>
                                            <li class="list-group-item">{{ $bid->subject }}</li>
                                            <li class="list-group-item">{{ $bid->modul }}</li>
                                            <li class="list-group-item">{{ $bid->hours }}</li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-group" id="ul4">
                                            <li class="list-group-item">{{ $bid->form_of_education }}</li>
                                            <li class="list-group-item">{{ $bid->form_education_implementation }}</li>
                                            <li class="list-group-item">{{ $bid->getEducationalPrograms() }}</li>
                                            <li class="list-group-item">{{ $bid->getEducationalActivities() }}</li>
                                            <li class="list-group-item">{{ $bid->content }}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{ $bid->getDataBegin() }} </li>
                                            <li class="list-group-item">{{ $bid->getDataEnd() }}</li>
                                        </ul>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
            </table>
            <br/>
            <br/>




            <h5 align="center">Одобренные программы</h5>
            <table class="table table-striped" id="myTable2">
                <thead>
                    <tr>
                        <th scope="col">Организация реципиент</th>

                        <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                        <th scope="col">
                            Форма/условия реализации обучения/ Образовательная программа/деятельность/ Комментарий
                        </th>

                        <th scope="col">
                            Даты
                        </th>

                        <th scope="col">Программа/ Расписание</th>
                        <th scope="col">Кол-во учеников/Список</th>
                        <th scope="col">Договор</th>
                    </tr>
                    </thead>

                    <tbody id="table2">
                        @foreach($user_org->programs_send() as $program)
                            @if(($program->status === 1))
                                <tr>
                                    <td>
                                        {{ $program->bid->user->fullname }}
                                        @if (Auth::user()->status == 1 || Auth::user()->status == 10)
                                        <p><a class="btn btn-outline-dark" href="/users/{{ $program->bid->user->id }}/show-org">Информация</a></p>
                                        @elseif(Auth::user()->id == $user_org->id)
                                        <p><a class="btn btn-outline-dark" href="/users/{{ $program->bid->user->id }}/about-org">Сведения</a></p>
                                        @endif
                                    </td>

                                    <td>
                                        <ul class="list-group" id="ul1">
                                            <li class="list-group-item">{{ $program->bid->getClasses() }}</li>
                                            <li class="list-group-item">{{ $program->bid->subject }}</li>
                                            <li class="list-group-item">{{ $program->bid->modul }}</li>
                                            <li class="list-group-item">{{ $program->bid->hours }}</li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-group" id="ul2">
                                            <li class="list-group-item">{{ $program->bid->form_of_education }} </li>
                                            <li class="list-group-item">{{ $program->bid->form_education_implementation }}</li>
                                            <li class="list-group-item">{{ $program->bid->getEducationalPrograms() }}</li>
                                            <li class="list-group-item">{{ $program->bid->getEducationalActivities() }}</li>
                                            <li class="list-group-item">{{ $program->bid->content }}</li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{ $program->bid->getDataBegin() }} </li>
                                            <li class="list-group-item">{{ $program->bid->getDataEnd() }}</li>
                                        </ul>
                                    </td>


                                    <td>
                                        <li class="list-group-item">
                                            <a href="/files/programs/{{ $program->filename }}"
                                                class="btn btn-outline-success">
                                                Программа
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            @if(($program->schedule) and ($program->schedule->status === 1))
                                                <a href="/files/schedules/{{ $program->schedule->filename }}"
                                                    class="btn btn-outline-success">
                                                    Расписание
                                                </a>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            @if(($program->schedule) and ($program->schedule->status === 1) and ($program->schedule->months_hour))
                                                <a href="/months_hours/{{ $program->schedule->months_hour->id }}/inf"
                                                    class="btn btn-outline-success">
                                                        Кол-во часов по месяцам
                                                </a>
                                            @endif
                                        </li>

                                    </td>

                                    <td>
                                        @if (($program->schedule) and ($program->schedule->status === 1)
                                        and ($program->schedule->student))
                                            <li class="list-group-item">
                                                {{$program->schedule->student->students_amount}}
                                            </li>
                                            <li class="list-group-item">
                                                <a href="/files/students/{{ $program->schedule->student->filename }}"
                                                    class="btn btn-outline-success">
                                                    Список учеников
                                                </a>
                                            </li>
                                        @endif
                                    </td>

                                    <td>
                                        @if (($program->schedule) and ($program->schedule->status === 1)
                                        and ($program->schedule->student) and ($program->schedule->student->agreement))
                                            <li class="list-group-item">
                                                <a href="/files/agreements/{{ $program->schedule->student->agreement->filename }}"
                                                    class="btn btn-outline-success">
                                                        Договор
                                                </a>
                                            </li>
                                        @endif
                                    </td>
                                <tr>
                            @endif
                        @endforeach

                    </tbody>
              </table>
            </br>
            <br/>


            <h5 align="center">Ваши образовательные программы</h5>
            <table class="table table-striped" id="myTable3">
                <thead>
                    <tr>

                        <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                        <th scope="col">
                            Форма/условия реализации обучения/ Образовательная программа/деятельность/ Комментарий
                        </th>

                        <th scope="col">
                            Даты
                        </th>

                    </tr>
                    </thead>

                    <tbody id="table3">
                        @foreach($user_org->proposed_programs() as $proposed_program)
                                <tr>
                                    <td>
                                        <ul class="list-group" id="ul3">
                                            <li class="list-group-item">{{ $proposed_program->getClasses() }}</li>
                                            <li class="list-group-item">{{ $proposed_program->subject }}</li>
                                            <li class="list-group-item">{{ $proposed_program->modul }}</li>
                                            <li class="list-group-item">{{ $proposed_program->hours }}</li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-group" id="ul4">
                                            <li class="list-group-item">{{ $proposed_program->form_of_education }}</li>
                                            <li class="list-group-item">{{ $proposed_program->form_education_implementation }}</li>
                                            <li class="list-group-item">{{ $proposed_program->educational_program }}</li>
                                            <li class="list-group-item">{{ $proposed_program->educational_activity }}</li>
                                            <li class="list-group-item">{{ $proposed_program->content }}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{ $proposed_program->getDataBegin() }} </li>
                                            <li class="list-group-item">{{ $proposed_program->getDataEnd() }}</li>
                                        </ul>
                                    </td>
                                </tr>
                        @endforeach

                    </tbody>
            </table>
            <br/>
            <br/>


            <h5 align="center">Организации, которые взяли выши программы</h5>
            <table class="table table-striped" id="myTable4">
                <thead>
                    <tr>
                        <th scope="col">Организация реципиент</th>

                        <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                        <th scope="col">
                            Форма/условия реализации обучения/ Образовательная программа/деятельность/ Комментарий
                        </th>

                        <th scope="col">
                            Даты
                        </th>

                        <th scope="col">Программа/ Расписание</th>
                        <th scope="col">Кол-во учеников/Список</th>
                        <th scope="col">Договор</th>
                    </tr>
                    </thead>

                    <tbody id="table4">
                        @if ($user_org->proposed_programs())
                        @foreach( $user_org->proposed_programs() as $proposed_program)
                            @if ($proposed_program->selected_programs())
                                @foreach($proposed_program->selected_programs() as $selected_program)
                                <tr>
                                    <td>
                                        {{$selected_program->user->fullname }}
                                        @if (Auth::user()->status == 1 || Auth::user()->status == 10)
                                        <p><a class="btn btn-outline-dark" href="/users/{{ $selected_program->user->id }}/show-org">Информация</a></p>
                                        @elseif(Auth::user()->id == $user_org->id)
                                        <p><a class="btn btn-outline-dark" href="/users/{{ $selected_program->user->id }}/about-org">Сведения</a></p>
                                        @endif
                                    </td>

                                    <td>
                                        <ul class="list-group" id="ul1">
                                            <li class="list-group-item">{{ $selected_program->proposed_program->getClasses() }}</li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->subject }}</li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->modul }}</li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->hours }}</li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-group" id="ul2">
                                            <li class="list-group-item">{{ $selected_program->proposed_program->form_of_education }} </li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->form_education_implementation }}</li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->educational_program }}</li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->educational_activitiy }}</li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->content }}</li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{ $selected_program->proposed_program->getDataBegin() }} </li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->getDataEnd() }}</li>
                                        </ul>
                                    </td>


                                    <td>
                                        <li class="list-group-item">
                                            <a href="/files/proposed_programs/{{ $selected_program->proposed_program->filename }}"
                                                class="btn btn-outline-success">
                                                Программа
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            @if(($selected_program->selected_schedule) and ($selected_program->selected_schedule->status === 1))
                                                <a href="/files/selected_schedules/{{ $selected_program->selected_schedule->filename }}"
                                                class="btn btn-outline-success">
                                                    Расписание
                                                </a>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            @if(($selected_program->selected_schedule) and ($selected_program->selected_schedule->status === 1) and ($selected_program->selected_schedule->selected_months_hour))
                                                <a href="/selected_months_hours/{{ $selected_program->selected_schedule->selected_months_hour->id }}/update"
                                                    class="btn btn-outline-info btn">
                                                    Кол-во часов по месяцам
                                                </a>
                                            @endif
                                        </li>

                                    </td>

                                    <td>
                                        @if (($selected_program->selected_schedule) and ($selected_program->selected_schedule->status === 1)
                                        and ($selected_program->selected_schedule->selected_student))
                                            <li class="list-group-item">
                                                {{$selected_program->selected_schedule->selected_student->students_amount}}
                                            </li>
                                            <li class="list-group-item">
                                                <a href="/files/students/{{ $selected_program->selected_schedule->selected_student->filename }}"
                                                    class="btn btn-outline-success">
                                                    Список учеников
                                                </a>
                                            </li>
                                        @endif
                                    </td>

                                    <td>
                                        @if (($selected_program->selected_schedule) and ($selected_program->selected_schedule->status === 1)
                                        and ($selected_program->selected_schedule->selected_student) and ($selected_program->selected_schedule->selected_student->selected_agreement))
                                            <li class="list-group-item">
                                                <a href="/files/selected_agreements/{{ $selected_program->selected_schedule->selected_student->selected_agreement->filename }}"
                                                    class="btn btn-outline-success">
                                                    Договор
                                                </a>
                                            </li>
                                        @endif
                                    </td>
                                <tr>
                            @endforeach
                            @endif
                        @endforeach
                        @endif

                    </tbody>
              </table>
            </br>
            <br/>


            <h5 align="center">Взятые вами образовательные программы</h5>
            <table class="table table-striped" id="myTable5">
                <thead>
                    <tr>
                        <th scope="col">Базовая организация</th>

                        <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                        <th scope="col">
                            Форма/условия реализации обучения/ Образовательная программа/деятельность/ Комментарий
                        </th>

                        <th scope="col">
                            Даты
                        </th>

                        <th scope="col">Программа/ Расписание</th>
                        <th scope="col">Кол-во учеников/Список</th>
                        <th scope="col">Договор</th>
                    </tr>
                    </thead>

                    <tbody id="table5">
                        @if ($user_org->selected_programs())
                            @foreach( $user_org->selected_programs() as $selected_program)
                                <tr>
                                    <td>
                                        {{$selected_program->proposed_program->user->fullname }}
                                        @if (Auth::user()->status == 1 || Auth::user()->status == 10)
                                        <p><a class="btn btn-outline-dark" href="/users/{{ $selected_program->proposed_program->user->id }}/show-org">Информация</a></p>
                                        @elseif(Auth::user()->id == $user_org->id)
                                        <p><a class="btn btn-outline-dark" href="/users/{{ $selected_program->proposed_program->user->id }}/about-org">Сведения</a></p>
                                        @endif
                                    </td>

                                    <td>
                                        <ul class="list-group" id="ul1">
                                            <li class="list-group-item">{{ $selected_program->proposed_program->getClasses() }}</li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->subject }}</li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->modul }}</li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->hours }}</li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-group" id="ul2">
                                            <li class="list-group-item">{{ $selected_program->proposed_program->form_of_education }} </li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->form_education_implementation }}</li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->educational_program }}</li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->educational_activitiy }}</li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->content }}</li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{ $selected_program->proposed_program->getDataBegin() }} </li>
                                            <li class="list-group-item">{{ $selected_program->proposed_program->getDataEnd() }}</li>
                                        </ul>
                                    </td>


                                    <td>
                                        <li class="list-group-item">
                                            <a href="/files/proposed_programs/{{ $selected_program->proposed_program->filename }}"
                                                class="btn btn-outline-success">
                                                Программа
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            @if(($selected_program->selected_schedule) and ($selected_program->selected_schedule->status === 1))
                                                <a href="/files/selected_schedules/{{ $selected_program->selected_schedule->filename }}"
                                                class="btn btn-outline-success">
                                                    Расписание
                                                </a>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            @if(($selected_program->selected_schedule) and ($selected_program->selected_schedule->status === 1) and ($selected_program->selected_schedule->selected_months_hour))
                                                <a href="/selected_months_hours/{{ $selected_program->selected_schedule->selected_months_hour->id }}/update"
                                                    class="btn btn-outline-info btn">
                                                    Кол-во часов по месяцам
                                                </a>
                                            @endif
                                        </li>

                                    </td>

                                    <td>
                                        @if (($selected_program->selected_schedule) and ($selected_program->selected_schedule->status === 1)
                                        and ($selected_program->selected_schedule->selected_student))
                                            <li class="list-group-item">
                                                {{$selected_program->selected_schedule->selected_student->students_amount}}
                                            </li>
                                            <li class="list-group-item">
                                                <a href="/files/students/{{ $selected_program->selected_schedule->selected_student->filename }}"
                                                    class="btn btn-outline-success">
                                                    Список учеников
                                                </a>
                                            </li>
                                        @endif
                                    </td>

                                    <td>
                                        @if (($selected_program->selected_schedule) and ($selected_program->selected_schedule->status === 1)
                                        and ($selected_program->selected_schedule->selected_student) and ($selected_program->selected_schedule->selected_student->selected_agreement))
                                            <li class="list-group-item">
                                                <a href="/files/selected_agreements/{{ $selected_program->selected_schedule->selected_student->selected_agreement->filename }}"
                                                    class="btn btn-outline-success">
                                                    Договор
                                                </a>
                                            </li>
                                        @endif
                                    </td>
                                <tr>
                        @endforeach
                        @endif

                    </tbody>
              </table>
            </br>
            <br/>


              @if(Auth::user()->status == 1)
                <p><a href="{{ route('org_list')}}"
                    class="btn btn-outline-info btn">
                    <i class="fas fa-arrow-left"></i> Вернуться к списку организаций Воронежской области
                </a></p>
                @elseif(Auth::user()->status == 10)
                <p><a href="/users/{{ Auth::user()->getDistrict->id }}/org-list-mun"
                    class="btn btn-outline-info btn">
                    <i class="fas fa-arrow-left"></i> Вернуться к списку организаций муниципалитета
                </a></p>
                @elseif(Auth::user()->id == $user_org->id)
                <p><a href="{{ route('home')}}"
                    class="btn btn-outline-info btn">
                    <i class="fas fa-arrow-left"></i> Вернуться на главную страницу
                </a></p>
                @endif

        </div>
    </div>
</div>
@endif
@endsection
