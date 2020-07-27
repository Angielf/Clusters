@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Школа</td>
                    <td>Класс</td>
                    <td>Предмет</td>
                    <td>Комментарий</td>
                    <td>Статус</td>
                    <td>Дата подачи</td>
                </tr>
                </thead>
                    <tr>
                        <td>{{ $bid->user->fullname }}</td>
                        <td>{{ $bid->class }}</td>
                        <td>{{ $bid->subject }}</td>
                        <td>{{ $bid->content }}</td>
                        <td>{!! $bid->getStatus() !!}</td>
                        <td>{{ $bid->created_at }}</td>
                        <td><a href="" class="btn btn-success">Добавить программу</a></td>
                    </tr>
            </table>
        </div>
    </div>
@endsection
