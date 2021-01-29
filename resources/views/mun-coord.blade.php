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
                    </div>
                    <ul class="list-group">
                        {{-- <li class="list-group-item">
                            Выгрузка всех заявок:
                            <a class="btn btn-outline-dark" href="{{ route('export') }}">Export</a>
                        </li> --}}
                        <li class="list-group-item">
                            Выгрузка заявок муниципалитета:
                            <a class="btn btn-outline-dark" href="{{ route('export_mun') }}">Export</a>
                        </li>
                        <li class="list-group-item">
                            Список организаций муниципалитета:
                            <a class="btn btn-outline-dark" href="/users/{{ Auth::user()->getDistrict->id }}/org-list-mun">Организации</a>
                        </li>
                        <li class="list-group-item">
                            Кол-во часов по месяцам:
                            <a class="btn btn-outline-dark" href="{{ route('export_hours_mun') }}">Export</a>
                        </li>
                        <li class="list-group-item">
                            Кол-во часов по месяцам у базовых организаций (январь-май):
                            <a class="btn btn-outline-dark" href="{{ route('export_h_mun') }}">Export</a>
                        </li>
                    </ul>

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

                        <ul class="list-group">

                            <li class="list-group-item">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          Организация реципиент
                                      </span>
                                    </div>
                                    <input type="text" class="form-control"
                                    id="rez" onkeyup="rez()">
                                </div>

                            </li>

                            <li class="list-group-item">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          Базовая организация
                                      </span>
                                    </div>
                                    <input type="text" class="form-control"
                                    id="bas" onkeyup="bas()">
                                </div>

                            </li>

                            <li class="list-group-item">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        Класс
                                      </span>
                                    </div>
                                    <input type="text" class="form-control"
                                    id="classs" onkeyup="classs()">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          Предмет(курс)
                                        </span>
                                    </div>
                                    <input type="text" class="form-control"
                                    id="subject" onkeyup="subject()">
                                </div>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        Раздел(модуль)
                                      </span>
                                    </div>
                                    <input type="text" class="form-control"
                                    id="modul" onkeyup="modul()">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Кол-во часов
                                        </span>
                                    </div>
                                    <input type="text" class="form-control"
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


                        </ul>



                        <table class="table table-striped" id="myTable">
                            <input type="hidden" id="rez_order" value="asc">
                            <input type="hidden" id="bas_order" value="asc">
                            <input type="hidden" id="dog_order" value="asc">
                            <thead>
                                <tr>
                                    <th scope="col" onclick="sort_rez();">Организация реципиент <i class="fas fa-arrows-alt-v"></th>
                                    <th scope="col" onclick="sort_bas();">Базовая организация <i class="fas fa-arrows-alt-v"></th>

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
                                    @foreach($bids as $bid)

                                        @if(($bid->status === 1))
                                        @if(($bid->user->district == $user->getDistrict->id))
                                            <tr>

                                                <td>{{ $bid->user->fullname }}</td>
                                                <td>
                                                    {{ $bid->programs()->sortByDesc('status')->first()->sender()->first()->fullname}}
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
                                    @endif
                                    @endforeach


                                </tbody>
                          </table>
                    </ul>
                    </div>

                    <div class="tab-pane fade" id="other">
                        <ul class="card-body">

                            <ul class="list-group">

                                <li class="list-group-item">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                              Организация реципиент
                                          </span>
                                        </div>
                                        <input type="text" aria-label="First name" class="form-control"
                                        id="rez2" onkeyup="rez2()">
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
                                        id="classs2" onkeyup="classs2()">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              Предмет(курс)
                                            </span>
                                        </div>
                                        <input type="text" aria-label="First name" class="form-control"
                                        id="subject2" onkeyup="subject2()">
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            Раздел(модуль)
                                          </span>
                                        </div>
                                        <input type="text" aria-label="First name" class="form-control"
                                        id="modul2" onkeyup="modul2()">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Кол-во часов
                                            </span>
                                        </div>
                                        <input type="text" aria-label="First name" class="form-control"
                                        id="hour2" onkeyup="hour2()">
                                    </div>

                                </li>

                                <li class="list-group-item">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            Форма обучения
                                          </span>
                                        </div>
                                        <input type="text" aria-label="First name" class="form-control"
                                        id="forma2" onkeyup="forma2()" list="Forma2">
                                        <datalist id="Forma2">
                                            <option value="очная">очная</option>
                                            <option value="очно-заочная">очно-заочная</option>
                                            <option value="заочная">заочная</option>
                                        </datalist>


                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Условия реализации обучения
                                            </span>
                                        </div>
                                        <input type="text" aria-label="First name" class="form-control"
                                        id="imp2" onkeyup="imp2()" list="Imp2">
                                        <datalist id="Imp2">
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
                                        <input type="text" aria-label="First name" class="form-control"
                                        id="pro2" onkeyup="pro2()" list="Pro2">
                                        <datalist id="Pro2">
                                            <option value="основная">основная</option>
                                            <option value="дополнительная">дополнительная</option>
                                        </datalist>

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Образовательная деятельность
                                            </span>
                                        </div>
                                          <input type="text" aria-label="First name" class="form-control"
                                          id="act2" onkeyup="act2()" list="Act2">
                                          <datalist id="Act2">
                                            <option value="урочная">урочная</option>
                                            <option value="внеурочная">внеурочная</option>
                                        </datalist>
                                    </div>

                                </li>


                            </ul>



                            <table class="table table-striped" id="myTable2">
                                <input type="hidden" id="rez2_order" value="asc">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">Муниципалитет</th> --}}
                                        <th scope="col" onclick="sort_rez2();">Организация реципиент <i class="fas fa-arrows-alt-v"></th>

                                        <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                                        <th scope="col">
                                            Форма/условия реализации обучения/ Образовательная программа/деятельность/ Комментарий
                                        </th>

                                        <th scope="col">
                                            Даты
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody id="table2">
                                        @foreach($bids as $bid)
                                        @if(($bid->user->district == $user->getDistrict->id))
                                            @if(($bid->status === 0) or ($bid->status === 9))
                                            <tr>
                                                <td>{{ $bid->user->fullname }}</td>

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



    <script src="js/poisk_mun.js"></script>
    <script src="js/sort_mun.js"></script>
@endsection
