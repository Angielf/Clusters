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
                    <td>Статус</td>
                </tr>
                </thead>
            @foreach($appeals as $appeal)
                    <tr>
                        <td>{{$appeal->user_id}}</td>
                        <td>{{$appeal->fio}}</td>
                        <td>{{$appeal->class}}</td>
                        <td>{{$appeal->subject}}</td>
                        <td>{{$appeal->status}}</td>
                    </tr>
            @endforeach
            </table>
        </div>
    </div>
@endsection
