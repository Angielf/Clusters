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


                    <ul class="card-body">

                        <a href="bids/create" class="btn btn-outline-primary btn-block">
                            Подать заявление на дефицит
                        </a>
                        <br>

                        <h5 align="center">Ваши заявления на дефицит</h5>

                        {{-- <div class="alert alert-info" role="alert">
                            <i class="fas fa-exclamation"></i> Сначала отклоните неподходящие программы, затем согласуйте нужную программу.
                        </div> --}}

                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">
                                    Класс/предмет/курс
                                </th>
                                <th scope="col">Статус заявки</th>
                                <th scope="col">Программа</th>
                                <th scope="col">Расписание</th>
                                <th scope="col">Список учеников</th>
                                <th scope="col">Количество учеников</th>
                                <th scope="col">Договор</th>
                              </tr>
                            </thead>

                            <tbody id="own_bids">
                                <tr>
                                    @if ($user->bids())
                                        @foreach( $user->bids() as $bid)
                                        <tr>
                                            <td>
                                                <ul class="list-group">
                                                    <li class="list-group-item">{{ $bid->getClasses() }}</li>
                                                    <li class="list-group-item">{{ $bid->subject }} </li>
                                                    <li class="list-group-item">{{ $bid->modul }}</li>
                                                    <li class="list-group-item">
                                                        <a href="/bids/{{ $bid->id }}/update"
                                                            class="btn btn-outline-info btn">
                                                            <i class="far fa-eye"></i> Редактирование и удаление
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="list-group">
                                                    <li class="list-group-item">{!! $bid->getStatus() !!}</li>
                                                    <li class="list-group-item">
                                                        @if($bid->status === 0)
                                                            <form action="{{ action('BidController@delete',$bid->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-outline-danger btn">
                                                                    <i class="far fa-trash-alt"></i> Удалить дефицит
                                                                </button>
                                                            </form>
                                                        @elseif($bid->status === 9)
                                                            <form action="{{ action('BidController@delete2',$bid->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-outline-danger btn">
                                                                    <i class="far fa-trash-alt"></i> Удалить дефицит и программы
                                                                </button>
                                                            </form>
                                                        @endif


                                                    </li>
                                                </ul>
                                            </td>
                                            {{-- @if ($bid->status !== 1) --}}
                                                <td>
                                                    @if ($bid->status === 9)
                                                        @foreach($bid->programs() as $program)

                                                            @if ($program->status !== 2)
                                                                <div class="card" style="width: 18rem;">
                                                                    <div class="card-body">
                                                                        <h6 class="card-title">
                                                                            {{$program->sender()->first()->fullname}}
                                                                        </h6>
                                                                        <p><a class="btn btn-outline-dark" href="/users/{{ $program->sender()->first()->id }}/about-org">Сведения</a></p>
                                                                        <p>
                                                                            <a href="/files/programs/{{ $program->filename }}"
                                                                                class="btn btn-outline-success">
                                                                                Программа
                                                                            </a>
                                                                            @if ($program->status !== 1)
                                                                                <p>
                                                                                    <a href="program/add/{{ $program->id }}"
                                                                                        class="btn btn-outline-info btn">
                                                                                        <i class="far fa-check-square"></i> Согласовать
                                                                                    </a>
                                                                                <p>

                                                                                <form action="{{ action('ProgramController@delete',$program->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="btn btn-outline-danger btn">
                                                                                        <i class="far fa-trash-alt"></i> Отклонить
                                                                                    </button>
                                                                                </form>
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                             @endif

                                                        @endforeach

                                                    @elseif($bid->status === 1)
                                                        @foreach($bid->programs() as $program)
                                                            @if($program->status === 1)
                                                            <div class="card" style="width: 18rem;">
                                                                <div class="card-body">
                                                                    <h6 class="card-title">
                                                                        {{$program->sender()->first()->fullname}}
                                                                    </h6>
                                                                    <p><a class="btn btn-outline-dark" href="/users/{{ $program->sender()->first()->id }}/about-org">Сведения</a></p>
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

                                                    @endif

                                                </td>
                                                {{-- @endif --}}

                                                @if (($bid->status === 1) and ($bid->programs()->sortByDesc('status')->first()->schedule))
                                                    <td>
                                                        <p><a href="/files/schedules/{{ $bid->programs()->sortByDesc('status')->first()->schedule->filename }}"
                                                           class="btn btn-outline-success">
                                                           Расписание
                                                        </a><br></p>

                                                        @if ($bid->programs()->sortByDesc('status')->first()->schedule->status !== 1)
                                                            <p><a href="schedule/add/{{ $bid->programs()->sortByDesc('status')->first()->schedule->id }}"
                                                               class="btn btn-outline-info">
                                                               <i class="far fa-check-square"></i> Согласовать
                                                            </a></p>
                                                            <form action="{{ action('ScheduleController@delete',$bid->programs()->sortByDesc('status')->first()->schedule->id) }}"
                                                                  method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                        class="btn btn-outline-danger">
                                                                        <i class="far fa-trash-alt"></i> Отклонить
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>

                                                    @if($bid->programs()->sortByDesc('status')->first()->schedule->status === 1)
                                                    <td>
                                                        @if ($bid->programs()->sortByDesc('status')->first()->schedule->student)
                                                            <p><a href="/files/students/{{ $bid->programs()->sortByDesc('status')->first()->schedule->student->filename }}"
                                                                class="btn btn-outline-success">
                                                                Список учеников
                                                            </a><br></p>

                                                            <td>
                                                                <p>
                                                                    {{ $bid->programs()->sortByDesc('status')->first()->schedule->student->students_amount }}
                                                                </p>
                                                            </td>

                                                            <td>
                                                                @if ($bid->programs()->sortByDesc('status')->first()->schedule->student->agreement)
                                                                    <a href="/files/agreements/{{ $bid->programs()->sortByDesc('status')->first()->schedule->student->agreement->filename }}"
                                                                        class="btn btn-outline-success">
                                                                        Договор
                                                                    </a>

                                                                @else
                                                                    <a href="/agreement/{{ $bid->programs()->sortByDesc('status')->first()->schedule->student->id }}"
                                                                        class="btn btn-outline-primary">
                                                                        <i class="fas fa-file-upload"></i> Добавить договор
                                                                    </a>
                                                                @endif


                                                            </td>

                                                        @else
                                                            <a href="/student/{{ $bid->programs()->sortByDesc('status')->first()->schedule->id }}"
                                                                class="btn btn-outline-primary">
                                                                <i class="fas fa-file-upload"></i> Добавить список учеников
                                                            </a>
                                                        @endif
                                                    </td>
                                                    @endif

                                                @endif

                                        </tr>
                                        @endforeach
                                    @endif

                                </tr>
                            </tbody>

                          </table>

                          <nav aria-label="Page navigation example">
                            <ul class="pagination" id="pag1">

                            </ul>
                          </nav>

                    </ul>




                    <div class="card-footer">
                        <div class="accordion" id="accordionExample">



                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                  <h5 class="mb-0">
                                      <a data-toggle="collapse" href="#collapseDeficits" aria-expanded="false"
                                      aria-controls="collapseDeficits">
                                          Дефициты других школ вашего муниципалитета
                                      </a>
                                  </h5>
                                </div>

                                <div id="collapseDeficits" class="collapse"
                                      aria-labelledby="collapseDeficits" data-parent="#accordionExample">
                                  <div class="card-body">

                                    {{-- Поиск --}}
                                    {{-- <ul class="list-group">
                                        <li class="list-group-item">

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                      Организация
                                                  </span>
                                                </div>
                                                <input type="text" aria-label="First name" class="form-control"
                                                id="rez" onkeyup="rez()" placeholder="Поиск по названию организации">
                                            </div>
                                        </li>

                                        <li class="list-group-item">

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                    Класс
                                                  </span>
                                                </div>
                                                <input type="text" aria-label="First name" class="form-control"
                                                id="classs" onkeyup="classs()">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                      Предмет(курс)
                                                    </span>
                                                </div>
                                                <input type="text" aria-label="First name" class="form-control"
                                                id="subject" onkeyup="subject()">
                                            </div>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                    Раздел(модуль)
                                                  </span>
                                                </div>
                                                <input type="text" aria-label="First name" class="form-control"
                                                id="modul" onkeyup="modul()">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Кол-во часов
                                                    </span>
                                                </div>
                                                <input type="text" aria-label="First name" class="form-control"
                                                id="hour" onkeyup="hour()">
                                            </div>

                                        </li>

                                        <li class="list-group-item">

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                    Форма обучения
                                                  </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                id="forma" onkeyup="forma()" list="Forma">
                                                <datalist id="Forma">
                                                    <option value="очная">очная</option>
                                                    <option value="очно-заочная">очно-заочная</option>
                                                    <option value="заочная">заочная</option>
                                                </datalist>


                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Условия реализации обучения
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                id="imp" onkeyup="imp()" list="Imp">
                                                <datalist id="Imp">
                                                    <option value="с использование дистанционных образовательных технологий, электронного обучения">
                                                        с использование дистанционных образовательных технологий, электронного обучения
                                                    </option>
                                                    <option value="трансфер детей до организации">трансфер детей до организации</option>
                                                </datalist>
                                            </div>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                    Образовательная программа
                                                  </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                id="pro" onkeyup="pro()" list="Pro">
                                                <datalist id="Pro">
                                                    <option value="основная">основная</option>
                                                    <option value="дополнительная">дополнительная</option>
                                                </datalist>

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Образовательная деятельность
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                id="act" onkeyup="act()" list="Act">
                                                <datalist id="Act">
                                                    <option value="урочная">урочная</option>
                                                    <option value="внеурочная">внеурочная</option>
                                                </datalist>

                                            </div>

                                        </li>
                                    </ul> --}}
                                    {{-- Конец поиска --}}


                                    <table class="table table-stripe" id="collapseExample3">
                                        <input type="hidden" id="rez_order" value="asc">
                                        <input type="hidden" id="pr_order" value="asc">
                                        <input type="hidden" id="ra_order" value="asc">
                                        <input type="hidden" id="st_order" value="asc">
                                        <input type="hidden" id="dog_order" value="asc">
                                        <thead>
                                        <tr>
                                            <th scope="col" onclick="sort_rez();">Организация <i class="fas fa-arrows-alt-v"></th>

                                            <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                                            <th scope="col">
                                                Форма/условия реализации обучения/ Образовательная программа/деятельность / Комментарий
                                            </th>

                                            <th scope="col">Даты</th>

                                            <th scope="col" onclick="sort_pr();">Предложить программу
                                                {{-- <i class="fas fa-arrows-alt-v"> --}}
                                            </th>
                                            <th scope="col" onclick="sort_ra();">Предложить расписание
                                                {{-- <i class="fas fa-arrows-alt-v"> --}}
                                            </th>
                                            <th scope="col" onclick="sort_st();">Кол-во учеников/Список
                                                {{-- <i class="fas fa-arrows-alt-v"> --}}
                                            </th>
                                            <th scope="col" onclick="sort_dog();">Договор
                                                {{-- <i class="fas fa-arrows-alt-v"> --}}
                                            </th>

                                        </tr>
                                        </thead>

                                        <tbody id="table2">
                                        @foreach($bids_all as $bid)
                                            @if(($bid->user_id != $user->id) and ($bid->user->district == $user->getDistrict->id))
                                            <tr class="tr_h">
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


                                                            {{-- @else
                                                                <p class="alert alert-dark" role="alert">
                                                                    Программа выполняется другой школой
                                                                </p> --}}

                                                            @endif
                                                        @endforeach

                                                    @endif

                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>

                                    </table>
                                  </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



<script src="js/poisk_sch.js"></script>
<script src="js/sort_sch.js"></script>
<script src="js/hide_sch.js"></script>
{{-- <script src="js/pag_sch.js"></script> --}}

@endsection
