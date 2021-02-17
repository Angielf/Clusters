@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>{{$user->fullname}} <br>
                            <small>{{$user->getDistrict->fullname}}</small>
                        </h2>

                        <a class="btn btn-outline-dark" href="/users/{{ $user->id }}/show-org">Сведения о вашей организации</a>
                    </div>

                    <ul class="nav nav-tabs">
                        <!-- Первая вкладка (активная) -->
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#nav-bids">
                                Заявки
                            </a>
                        </li>
                        <!-- Вторая вкладка -->
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#nav-proposed">
                                Образовательные программы
                            </a>
                        </li>
                    </ul>


                    <div class="tab-content">
                    <div class="tab-pane fade show active" id="nav-bids">
                    <ul class="card-body">
                        <h5 align="center">Дефициты организаций Воронежской области</h5>

                        <table class="table table-stripe" id="myTable">
                            <input type="hidden" id="mun_order" value="asc">
                            <input type="hidden" id="rez_order" value="asc">
                            <input type="hidden" id="dog_order" value="asc">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" onclick="sort_mun();">Муниципалитет <i class="fas fa-arrows-alt-v"></i></th>
                                    <th scope="col" onclick="sort_rez();">Организация <i class="fas fa-arrows-alt-v"></th>

                                    <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                                    <th scope="col">
                                        Форма/условия реализации обучения/ Образовательная программа/деятельность/ Комментарий
                                    </th>

                                    <th scope="col">Даты</th>

                                    <th scope="col">Предложить программу</th>
                                    <th scope="col">Предложить расписание</th>
                                    <th scope="col">Кол-во учеников/Список</th>
                                    <th scope="col">Договор</th>

                                </tr>
                                </thead>
                                <tbody id="table1">
                                @foreach($bids_all as $bid)
                                    @if(($bid->user_id != $user->id))
                                    <tr class="tr_h">
                                        <td>
                                            {{ $bid->user->getDistrict->fullname }}
                                        </td>

                                        <td>
                                            {{ $bid->user->fullname }}
                                            <p><a class="btn btn-outline-dark" href="/users/{{ $bid->user->id }}/about-org">Сведения</a></p>
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

                                        <td>
                                            @if ($bid->status !== 1)

                                                @foreach($bid->programs() as $program)
                                                    @if($program->school_program_id === $user->id)
                                                        <p class="alert alert-info p1" role="alert">
                                                            Программа отправлена
                                                        </p>
                                                    @endif
                                                @endforeach

                                                <a href="/program/{{ $bid->id }}"
                                                    class="btn btn-outline-primary p1">
                                                    <i class="fas fa-file-upload"></i> Предложить программу
                                                </a>

                                            @else
                                                @foreach($bid->programs() as $program)
                                                    @if($program->school_program_id === $user->id)
                                                        @if($program->status === 1)

                                                            <p class="alert alert-success p1" role="alert">
                                                                Одобрена
                                                            </p>

                                                            <a href="/files/programs/{{ $bid->programs()->sortByDesc('status')->first()->filename }}"
                                                                class="btn btn-outline-success">
                                                                Программа
                                                            </a>

                                                            @if ($bid->programs()->sortByDesc('status')->first()->schedule)
                                                                <td>
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item">
                                                                    {{-- @if ($bid->program->schedule) --}}
                                                                        @if($bid->programs()->sortByDesc('status')->first()->schedule->status !== 2)
                                                                            <p>
                                                                                {!! $bid->programs()->sortByDesc('status')->first()->schedule->getStatus() !!}
                                                                            </p>
                                                                            <a href="/files/schedules/{{ $bid->programs()->sortByDesc('status')->first()->schedule->filename }}"
                                                                                class="btn btn-outline-success">
                                                                                Расписание
                                                                            </a>
                                                                        @endif
                                                                        </li>
                                                                        @if($bid->programs()->sortByDesc('status')->first()->schedule->status === 1)
                                                                        <li class="list-group-item">
                                                                            @if($bid->programs()->sortByDesc('status')->first()->schedule->months_hour)
                                                                            <a href="/months_hours/{{ $bid->programs()->sortByDesc('status')->first()->schedule->months_hour->id }}/update"
                                                                                class="btn btn-outline-info btn">
                                                                                Кол-во часов по месяцам
                                                                            </a>
                                                                            @else
                                                                            <a href="/months_hours/{{ $bid->programs()->sortByDesc('status')->first()->schedule->id }}"
                                                                                class="btn btn-outline-info btn">
                                                                                Добавить кол-во часов по месяцам
                                                                            </a>
                                                                            @endif
                                                                        </li>
                                                                        @endif
                                                                    </ul>
                                                                </td>
                                                                @if($bid->programs()->sortByDesc('status')->first()->schedule->status === 1)
                                                                    <td>
                                                                        @if ($bid->programs()->sortByDesc('status')->first()->schedule->student)
                                                                            <p>
                                                                                {{ $bid->programs()->sortByDesc('status')->first()->schedule->student->students_amount }}
                                                                            </p>
                                                                            <a href="/files/students/{{ $bid->programs()->sortByDesc('status')->first()->schedule->student->filename }}"
                                                                                class="btn btn-outline-success">
                                                                                Список учеников
                                                                            </a>

                                                                            <td>
                                                                                @if ($bid->programs()->sortByDesc('status')->first()->schedule->student->agreement)
                                                                                    <a href="/files/agreements/{{ $bid->programs()->sortByDesc('status')->first()->schedule->student->agreement->filename }}"
                                                                                        class="btn btn-outline-success">
                                                                                        Договор
                                                                                    </a>
                                                                                {{-- @else
                                                                                    <a href="/agreement/{{ $bid->program->schedule->student->id }}"
                                                                                        class="btn btn-outline-danger">
                                                                                            Добавить договор
                                                                                    </a> --}}
                                                                                @endif
                                                                            </td>


                                                                        @endif
                                                                    </td>
                                                                @endif

                                                            @else
                                                            <td>

                                                                    {{-- <a href="/schedule/{{ $bid->program->id }}"
                                                                        class="btn btn-outline-primary">
                                                                        <i class="fas fa-file-upload"></i> Добавить расписание
                                                                    </a> --}}
                                                                    <a href="/schedule/{{ $bid->programs()->where('status', '=', 1)->first()->id }}"
                                                                        class="btn btn-outline-primary">
                                                                        <i class="fas fa-file-upload"></i> Добавить расписание
                                                                    </a>

                                                            </td>
                                                            @endif


                                                        @elseif($program->status === 2)
                                                            <p>
                                                                <div class="alert alert-danger">
                                                                    Программа отклонена
                                                                </div>
                                                            </p>
                                                        @endif

                                                    @endif
                                                @endforeach

                                            @endif

                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                        </table>

                    </ul>

                </div>


                <div class="tab-pane fade" id="nav-proposed">
                    <ul class="card-body">

                        <a href="proposed/add" class="btn btn-outline-primary btn-block">
                            Предложить свою образовательную программу
                        </a>
                        <br>

                        <div class="accordion" id="accordionExample3">
                            <div class="card">
                                <div class="card-header" id="headingOwn">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOwnProposed" aria-expanded="false"
                                            aria-controls="collapseOwnProposed">
                                            Ваши образовательные программы
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapseOwnProposed" class="collapse"
                                    aria-labelledby="collapseOwnProposed" data-parent="#accordionExample3">
                                    <div class="card-body">
                                        <table class="table table-stripe">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>
                                                    <th scope="col">
                                                        Форма/условия реализации обучения/ Образовательная программа/деятельность / Комментарий
                                                    </th>
                                                    <th scope="col">Даты</th>
                                                    <th scope="col">Программа</th>
                                                </tr>
                                            </thead>

                                            <tbody id="own_proposed">
                                                {{-- <tr> --}}
                                                    @if ($user->proposed_programs())
                                                        @foreach( $user->proposed_programs() as $proposed_program)
                                                        <tr>
                                                            <td>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">{{ $proposed_program->getClasses() }}</li>
                                                                    <li class="list-group-item">{{ $proposed_program->subject }} </li>
                                                                    <li class="list-group-item">{{ $proposed_program->modul }}</li>
                                                                    <li class="list-group-item">{{ $proposed_program->hours }}</li>
                                                                    <li class="list-group-item">
                                                                        <a href="/proposed_programs/{{ $proposed_program->id }}/update"
                                                                            class="btn btn-outline-info btn">
                                                                            <i class="far fa-eye"></i> Редактирование и удаление
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">{{ $proposed_program->form_of_education }}</li>
                                                                    <li class="list-group-item">{{ $proposed_program->form_education_implementation }}</li>
                                                                    <li class="list-group-item">{{ $proposed_program->educational_program }}</li>
                                                                    <li class="list-group-item">{{ $proposed_program->educational_activity }}</li>
                                                                    <li class="list-group-item">{{ $proposed_program->content }}</li>
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">{{ $proposed_program->getDataBegin() }}</li>
                                                                    <li class="list-group-item">{{ $proposed_program->getDataEnd() }}</li>
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <a href="/files/proposed_programs/{{ $proposed_program->filename }}"
                                                                    class="btn btn-outline-success">
                                                                    Программа
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    @endif
                                                {{-- </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </br>
                        </br>
                        <h5 align="center">Организации, которые взяли ваши программы</h5>

                        <table class="table table-stripe border-bottom">
                            <thead>
                                <tr>
                                    <th scope="col">Организация реципиент</th>
                                    <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                                    <th scope="col">
                                        Форма/условия реализации обучения/ Образовательная программа/деятельность / Комментарий
                                    </th>

                                    <th scope="col">Даты</th>

                                    <th scope="col">Программа</th>
                                    <th scope="col">Расписание</th>
                                    <th scope="col">Ученики</th>
                                    <th scope="col">Договор</th>
                                </tr>
                            </thead>

                            <tbody id="own_proposed">
                                {{-- <tr> --}}
                                    @if ($user->proposed_programs())
                                        @foreach( $user->proposed_programs() as $proposed_program)
                                        @if ($proposed_program->selected_programs())
                                        @foreach($proposed_program->selected_programs() as $selected_program)
                                        <tr>
                                        <td>
                                            <ul class="list-group">
                                                <li class="list-group-item">{{ $selected_program->user->fullname }}</li>
                                                <li class="list-group-item">
                                                    <a class="btn btn-outline-dark" href="/users/{{ $selected_program->user->id }}/about-org">Сведения</a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="list-group">
                                                <li class="list-group-item">{{ $selected_program->proposed_program->getClasses() }}</li>
                                                <li class="list-group-item">{{ $selected_program->proposed_program->subject }} </li>
                                                <li class="list-group-item">{{ $selected_program->proposed_program->modul }}</li>
                                                <li class="list-group-item">{{ $selected_program->proposed_program->hours }}</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="list-group">
                                                <li class="list-group-item">{{ $selected_program->proposed_program->form_of_education }}</li>
                                                <li class="list-group-item">{{ $selected_program->proposed_program->form_education_implementation }}</li>
                                                <li class="list-group-item">{{ $selected_program->proposed_program->educational_program }}</li>
                                                <li class="list-group-item">{{ $selected_program->proposed_program->educational_activity }}</li>
                                                <li class="list-group-item">{{ $selected_program->proposed_program->content }}</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="list-group">
                                                <li class="list-group-item">{{ $selected_program->proposed_program->getDataBegin() }}</li>
                                                <li class="list-group-item">{{ $selected_program->proposed_program->getDataEnd() }}</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="/files/proposed_programs/{{ $selected_program->proposed_program->filename }}"
                                                class="btn btn-outline-success">
                                                Программа
                                            </a>
                                        </td>
                                        @if ($selected_program->selected_schedule)
                                            <td>
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        @if($selected_program->selected_schedule->status !== 2)
                                                            <p>
                                                                {!! $selected_program->selected_schedule->getStatus() !!}
                                                            </p>
                                                            <a href="/files/selected_schedules/{{ $selected_program->selected_schedule->filename }}"
                                                                class="btn btn-outline-success">
                                                                    Расписание
                                                            </a>
                                                        @endif
                                                    </li>
                                                    @if($selected_program->selected_schedule->status === 1)
                                                        <li class="list-group-item">
                                                            @if($selected_program->selected_schedule->selected_months_hour)
                                                                <a href="/selected_months_hours/{{ $selected_program->selected_schedule->selected_months_hour->id }}/update"
                                                                    class="btn btn-outline-info btn">
                                                                    Кол-во часов по месяцам
                                                                </a>
                                                            @else
                                                                <a href="/selected_months_hours/{{ $selected_program->selected_schedule->id }}"
                                                                    class="btn btn-outline-info btn">
                                                                    Добавить кол-во часов по месяцам
                                                                </a>
                                                            @endif
                                                        </li>
                                                    @endif
                                                </ul>
                                            </td>
                                            @if($selected_program->selected_schedule->status === 1)
                                                <td>
                                                    @if ($selected_program->selected_schedule->selected_student)
                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                {{ $selected_program->selected_schedule->selected_student->students_amount }}
                                                            </li>
                                                            <li class="list-group-item">
                                                                <a href="/files/students/{{ $selected_program->selected_schedule->selected_student->filename }}"
                                                                    class="btn btn-outline-success">
                                                                    Список учеников
                                                                </a>
                                                            </li>
                                                        </ul>

                                                        <td>
                                                            @if ($selected_program->selected_schedule->selected_student->selected_agreement)
                                                                <a href="/files/selected_agreements/{{ $selected_program->selected_schedule->selected_student->selected_agreement->filename }}"
                                                                    class="btn btn-outline-success">
                                                                    Договор
                                                                </a>

                                                            @endif
                                                        </td>


                                                    @endif
                                                </td>
                                            @endif
                                        @else
                                            <td>
                                                <a href="/selected_schedule/{{ $selected_program->id }}"
                                                    class="btn btn-outline-primary">
                                                    <i class="fas fa-file-upload"></i> Добавить расписание
                                                </a>
                                            </td>
                                        @endif

                                        </tr>
                                        @endforeach
                                        @endif
                                        @endforeach
                                    @endif
                                {{-- </tr> --}}
                            </tbody>

                        </table>

                    </ul>

                </div>

                </div>


                </div>
            </div>
        </div>
    </div>


<script src="js/poisk_reg.js"></script>
<script src="js/sort_reg.js"></script>
<script src="js/hide_reg.js"></script>
@endsection
