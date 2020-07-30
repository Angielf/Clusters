@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Базовая школа</th>
                    <th>Район</th>
                    <th>Школы реципиенты</th>
                    <th>Решение</th>
                </tr>
                </thead>
                @foreach($clusters as $cluster)
                    <tr>
                        <td>{{$cluster->id}}</td>
                        <td>{{$cluster->user->fullname}}</td>
                        <td>{{$cluster->district->fullname}}</td>
                        <td>
                            @foreach(json_decode($cluster->schools, true) as $school)
                                {{ $school['school_name'] }} <a href="/files//{{ $school['file_name'] }}">Соглашение</a>
                                <br>
                            @endforeach
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-success btn-sm">Одобрить</button>
                            <button type="button" class="btn btn-outline-danger btn-sm">Отклонить</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
