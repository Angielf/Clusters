@extends('layouts.app')

@section('content')
@if (Auth::user() && Auth::user()->status == 1)
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <p><a href="{{ route('home')}}"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться на главную страницу
            </a></p>

            <ul class="list-group">
                <li class="list-group-item">

                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              Муниципалитет
                          </span>
                        </div>
                        <input type="text" class="form-control"
                        id="mun" onkeyup="mun()" list="Mun">
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
                        <input type="text" class="form-control"
                        id="org" onkeyup="org()">
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              ИНН
                          </span>
                        </div>
                        <input type="text" class="form-control"
                        id="inn" onkeyup="inn()">
                    </div>
                </li>

            </ul>

            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Район</th>
                        <th scope="col">Организация</th>
                        <th scope="col">ИНН</th>
                        <th scope="col">Кол-во заявок</th>
                        <th scope="col">Кол-во одобренных программ</th>
                        <th scope="col">Информация</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user_org)
                    <tr>
                        <th scope="row">{{ $user_org->id }}</th>
                        <td>{{ $user_org->getDistrict->fullname }}</td>
                        <td>{{ $user_org->fullname }}</td>
                        <td>{{ $user_org->inn }}</td>
                        <td>{{ $user_org->amount_of_bids() }}</td>
                        <td>{{ $user_org->amount_of_programs_1() }}</td>
                        <td>
                            <a class="btn btn-outline-dark" href="/users/{{ $user_org->id }}/show-org">Информация</a>
                        </td>
                    </tr>
                    @endforeach
                  </tr>

                </tbody>
            </table>

            <p><a href="{{ route('home')}}"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться на главную страницу
            </a></p>
        </div>
    </div>
</div>


<script src="{{ asset('js/poisk_organizations_list_reg.js') }}"></script>
@endif
@endsection
