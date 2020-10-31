@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h3>Добавить предмет </h3>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('bids.adding') }}" enctype="multipart/form-data">
                    @csrf

                    <ul class="list-group">
                        <label for="class">Класс/группа:</label>
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
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="class[]" type="checkbox" value="смешанная группа">
                                <label class="form-check-label">смешанная группа</label>
                            </div>
                        </li>
                    </ul>

                    <div class="form-group">
                        <label for="subject">Предмет/курс:</label>
                        <input type="text" class="form-control" name="subject"/>
                    </div>

                    <div class="form-group">
                        <label for="modul">Раздел/модуль:</label>
                        <input type="text" class="form-control" name="modul"/>
                    </div>

                    <div class="form-group">
                        <label for="modul">Кол-во часов:</label>
                        <input type="text" class="form-control" name="hours"/>
                    </div>


                    <ul class="list-group">
                        <label for="educational_program">Образовательная программа:</label>
                        <li class="list-group-item">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="educational_program[]" type="checkbox"
                                    value="основная">
                                <label class="form-check-label">основная</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="educational_program[]" type="checkbox"
                                    value="дополнительная">
                                <label class="form-check-label">дополнительная</label>
                            </div>
                        </li>
                    </ul>

                    <ul class="list-group">
                        <label for="educational_activity">Образовательная деятельность:</label>
                        <li class="list-group-item">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="educational_activity[]" type="checkbox"
                                    value="урочная">
                                <label class="form-check-label">урочная</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="educational_activity[]" type="checkbox"
                                    value="внеурочная">
                                <label class="form-check-label">внеурочная</label>
                            </div>
                        </li>
                    </ul>


                    <div class="form-group">
                        <label for="form_of_education">Форма обучения:</label>
                        <select class="form-control" name="form_of_education">
                            <option value=""></option>
                            <option value="очная">очная</option>
                            <option value="очно-заочная">очно-заочная</option>
                            <option value="заочная">заочная</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="form_education_implementation">Условия реализации образовательных программ:</label>
                        <select class="form-control" name="form_education_implementation">
                            <option value=""></option>
                            <option value="с использование дистанционных образовательных технологий, электронного обучения">с использование дистанционных образовательных технологий, электронного обучения</option>

                            <option value="трансфер детей до организации">трансфер детей до организации</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="content">Комментарий:</label>
                        <textarea class="form-control" name="content"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="program">
                            <label class="custom-file-label">Загрузить</label>
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Добавить программу</button>
                </form>
            </div>
        </div>
    </div>
@endsection
