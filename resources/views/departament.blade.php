@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$user->fullname}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

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
                                        <td><a href="/appeals/{{$appeal->id}}/edit">{{$appeal->fio}}</a></td>
                                        <td>{{$appeal->getClasses}}</td>
                                        <td>{{$appeal->subject}}</td>
                                        <td>{{$appeal->date_of_appeal}}</td>
                                        <td>{{$appeal->status}}</td>
                                    </tr>
                                @endforeach
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
