@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Школа</td>
                    <td>ФИО</td>
                    <td>Класс</td>
                    <td>Предмет</td>
                    <td>Комментарий</td>
                    <td>Статус</td>
                    <td>Дата проведения аппеляции</td>
                    <td>Дата подачи</td>
                </tr>
                </thead>
                    <tr>
                        <td>{{$appeal->user_id}}</td>
                        <td>{{$appeal->fio}}</td>
                        <td>{{$appeal->class}}</td>
                        <td>{{$appeal->subject}}</td>
                        <td>{{$appeal->comment}}</td>
                        <td>{{$appeal->status}}</td>
                        <td>{{$appeal->date_of_appeal}}</td>
                        <td>{{$appeal->created_at}}</td>
                    </tr>
            </table>
        </div>
    </div>
@endsection
