@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h3>Добавить проблемный предмет </h3>
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

                    <div class="form-group">
                        <label for="class">Класс:</label>
                        <input type="text" class="form-control" name="class"/>
                    </div>

                    <div class="form-group">
                        <label for="subject">Предмет/курс:</label>
                        <input type="text" class="form-control" name="subject"/>
                    </div>

                    <div class="form-group">
                        <label for="modul">Раздел/модуль:</label>
                        <input type="text" class="form-control" name="modul"/>
                    </div>

                    <div class="form-group">
                        <label for="form_of_education">Форма получения образования</label>
                        <select class="form-control" name="form_of_education">
                            <option value=""></option>
                            <option value="очная">очная</option>
                            <option value="очно-заочная">очно-заочная</option>
                            <option value="заочная">заочная</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="form_education_implementation">Форма реализации образовательных программ</label>
                        <select class="form-control" name="form_education_implementation">
                            <option value=""></option>
                            <option value="с использованием электронного обучения">с использованием электронного обучения</option>
                            <option value="сетевая форма">сетевая форма</option>
                            <option value="наличие подвоза детей до организации">наличие подвоза детей до организации</option>
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