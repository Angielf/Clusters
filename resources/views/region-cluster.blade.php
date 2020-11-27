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


                    <ul class="card-body">
                        <h5 align="center">Дефициты организаций Воронежской области</h5>

                        {{-- Поиск --}}
                        <ul class="list-group">
                            <li class="list-group-item">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          Муниципалитет
                                      </span>
                                    </div>
                                    <input type="text" class="form-control"
                                    id="mun" onkeyup="mun()" list="Mun" placeholder="Поиск по названию муниципалитета">
                                    <datalist id="Mun">
                                        <option value="Городской округ город Воронеж">Городской округ город Воронеж</option>
                                        <option value="Аннинский муниципальный район">Аннинский муниципальный район</option>
                                        <option value="Бобровский муниципальный район">Бобровский муниципальный район</option>
                                        <option value="Богучарский муниципальный район">Богучарский муниципальный район</option>
                                        <option value="Борисоглебский городской округ">Борисоглебский городской округ</option>
                                        <option value="Бутурлиновский муниципальный район">Бутурлиновский муниципальный район</option>
                                        <option value="Верхнемамонский муниципальный район">Верхнемамонский муниципальный район</option>
                                        <option value="Верхнехавский муниципальный район">Верхнехавский муниципальный район</option>
                                        <option value="Воробьевский муниципальный район">Воробьевский муниципальный район</option>
                                        <option value="Городской округ город Нововоронеж">Городской округ город Нововоронеж</option>
                                        <option value="Калачеевский муниципальный район">Калачеевский муниципальный район</option>
                                        <option value="Каменский муниципальный район">Каменский муниципальный район</option>
                                        <option value="Кантемировский муниципальный район">Кантемировский муниципальный район</option>
                                        <option value="Каширский муниципальный район">Каширский муниципальный район</option>
                                        <option value="Лискинский муниципальный район">Лискинский муниципальный район</option>
                                        <option value="Нижнедевицкий муниципальный район">Нижнедевицкий муниципальный район</option>
                                        <option value="Новоусманский муниципальный район">Новоусманский муниципальный район</option>
                                        <option value="Новохоперский муниципальный район">Новохоперский муниципальный район</option>
                                        <option value="Ольховатский муниципальный район">Ольховатский муниципальный район</option>
                                        <option value="Острогожский муниципальный район">Острогожский муниципальный район</option>
                                        <option value="Павловский муниципальный район">Павловский муниципальный район</option>
                                        <option value="Панинский муниципальный район">Панинский муниципальный район</option>
                                        <option value="Петропавловский муниципальный район">Петропавловский муниципальный район</option>
                                        <option value="Поворинский муниципальный район">Поворинский муниципальный район</option>
                                        <option value="Подгоренский муниципальный район">Подгоренский муниципальный район</option>
                                        <option value="Рамонский муниципальный район">Рамонский муниципальный район</option>
                                        <option value="Репьевский муниципальный район">Репьевский муниципальный район</option>
                                        <option value="Россошанский муниципальный район">Россошанский муниципальный район</option>
                                        <option value="Семилукский муниципальный район">Семилукский муниципальный район</option>
                                        <option value="Таловский муниципальный район">Таловский муниципальный район</option>
                                        <option value="Терновский муниципальный район">Терновский муниципальный район</option>
                                        <option value="Хохольский муниципальный район">Хохольский муниципальный район</option>
                                        <option value="Эртильский муниципальный район">Эртильский муниципальный район</option>
                                    </datalist>
                                </div>

                            </li>

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
                        </ul>
                        {{-- Конец поиска --}}

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

                                    <th scope="col">Предложить программу</th>
                                    <th scope="col">Предложить расписание</th>
                                    <th scope="col">Кол-во учеников/Список</th>
                                    <th scope="col" onclick="sort_dog();">Договор</th>

                                </tr>
                                </thead>
                                <tbody id="table1">
                                @foreach($bids_all as $bid)
                                    @if(($bid->user_id != $user->id))
                                    <tr class="tr_h">
                                        <td>{{ $bid->user->getDistrict->fullname }}</td>
                                        <td>{{ $bid->user->fullname }}</td>

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
                                            @if ($bid->status !== 1)

                                                @foreach($bid->programs() as $program)
                                                    @if($program->school_program_id === $user->id)
                                                        <p class="alert alert-info p1" role="alert">
                                                            Программа отправлена
                                                        </p>
                                                    @endif
                                                @endforeach

                                                <a href="/program/{{ $bid->id }}"
                                                    class="btn btn-outline-danger p1">
                                                    Предложить программу
                                                </a>

                                            @else
                                                @foreach($bid->programs() as $program)
                                                    @if($program->school_program_id === $user->id)
                                                        @if($program->status === 1)

                                                            <p class="alert alert-success p1" role="alert">
                                                                Одобрена
                                                            </p>

                                                            <a href="/files/programs/{{ $bid->program->filename }}"
                                                                class="btn btn-outline-success">
                                                                Программа
                                                            </a>

                                                            @if ($bid->program->schedule)
                                                                <td>
                                                                    @if($bid->program->schedule->status !== 2)
                                                                        <p>
                                                                            {!! $bid->program->schedule->getStatus() !!}
                                                                        </p>
                                                                        <a href="/files/schedules/{{ $bid->program->schedule->filename }}"
                                                                            class="btn btn-outline-success">
                                                                            Расписание
                                                                        </a>
                                                                    @endif
                                                                </td>
                                                                @if($bid->program->schedule->status === 1)
                                                                    <td>
                                                                        @if ($bid->program->schedule->student)
                                                                            <p>
                                                                                {{ $bid->program->schedule->student->students_amount }}
                                                                            </p>
                                                                            <a href="/files/students/{{ $bid->program->schedule->student->filename }}"
                                                                                class="btn btn-outline-success">
                                                                                Список учеников
                                                                            </a>

                                                                            <td>
                                                                                @if ($bid->program->schedule->student->agreement)
                                                                                    <a href="/files/agreements/{{ $bid->program->schedule->student->agreement->filename }}"
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
                                                                    <a href="/schedule/{{ $bid->program->id }}"
                                                                        class="btn btn-outline-danger">
                                                                        Добавить расписание
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




                    {{-- <div class="card-footer">

                    </div> --}}

                </div>
            </div>
        </div>
    </div>


<script src="js/poisk_reg.js"></script>
<script src="js/sort_reg.js"></script>
<script src="js/hide_reg.js"></script>
@endsection
