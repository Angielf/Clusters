@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>{{ $bids[0]->user->fullname }}</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Класс</td>
                    <td>Предмет/курс</td>
                    <td>Раздел/модуль</td>
                    <td>Форма получения образования</td>
                    <td>Форма реализации образовательной программы</td>
                    <td>Комментарий</td>
                    <td>Статус</td>
                </tr>
                </thead>
            @foreach($bids as $bid)
                    <tr>
                        <td>{{ $bid->class }}</td>
                        <td>{{ $bid->subject }}</td>
                        <td>{{ $bid->modul }}</td>
                        <td>{{ $bid->form_of_education }}</td>
                        <td>{{ $bid->form_education_implementation }}</td>
                        <td>{{ $bid->content }}</td>
                        <td>{!! $bid->getStatus() !!}</td>
                    </tr>
            @endforeach
            </table>
        </div>
    </div>
@endsection
