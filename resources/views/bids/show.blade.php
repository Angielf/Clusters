@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Школа</td>
                    <td>Класс</td>
                    <td>Предмет/курс</td>
                    <td>Раздел/модуль</td>
                    <td>Форма получения образования</td>
                    <td>Форма реализации образовательной программы</td>
                    <td>Комментарий</td>
                    <td>Статус</td>
                    <td>Дата подачи</td>
                </tr>
                </thead>
                    <tr>
                        <td>{{ $bid->user->fullname }}</td>
                        <td>{{ $bid->class }}</td>
                        <td>{{ $bid->subject }}</td>
                        <td>{{ $bid->modul }}</td>
                        <td>{{ $bid->form_of_education }}</td>
                        <td>{{ $bid->form_education_implementation }}</td>
                        <td>{{ $bid->content }}</td>
                        <td>{!! $bid->getStatus() !!}</td>
                        <td>{{ $bid->created_at }}</td>
                        <td><a href="/programs/create/{{ $bid->id }}" class="btn btn-success">Добавить программу</a></td>
                    </tr>
            </table>
        </div>
    </div>
@endsection
