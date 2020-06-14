@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ФИО</td>
                    <td>Класс</td>
                    <td>Предмет</td>
                    <td>Дата проведения аппеляции</td>
                    <td>Статус</td>
                </tr>
                </thead>
            @foreach($appeals as $appeal)
                    <tr>
                        <td><a href="/appeals/{{$appeal->id}}">{{$appeal->fio}}</a></td>
                        <td>{{$appeal->class}}</td>
                        <td>{{$appeal->subject}}</td>
                        <td>{{$appeal->date_of_appeal}}</td>
                        <td>{{$appeal->status}}</td>
                    </tr>
            @endforeach
            </table>
        </div>
    </div>
@endsection
