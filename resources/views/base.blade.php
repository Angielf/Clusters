@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>{{$user->fullname}} </h2>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h3>Кластер № {{$cluster->id}}</h3>
                <h4>{{$cluster->district->fullname}}</h4>

                @if ($cluster->status === 1)
                    <div class="alert alert-success" role="alert">
                        Заяка на создание кластер одобрена
                    </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        Заявка на создание кластера в рассмотрении
                    </div>
                @endif
                <table class="table table-striped">
                    <tr>
                        <th>Образовательная организация</th>
                        <th>Западения по предметам</th>
                        <th>Соглашение</th>
                    </tr>
                    @foreach(json_decode($cluster->schools, true) as $school)
                        <tr>
                            <td>{{ $school['school_name'] }}</td>
                            <td>
                                @foreach($districts as $district)
                                    @foreach($district->users as $user)
                                        @if(($user->id === $school['school_id']) && ($bids = $user->bids))
                                            @foreach ($bids as $bid)
                                                <p><a href="/bids/{{ $bid->id }}">{{ $bid->class }}
                                                        класс {{ $bid->subject }} </a>
                                                    @if ($bid->status !== 1)
                                                        <a href="/program/{{ $bid->id }}"
                                                           class="btn btn-outline-success btn-sm">Добавить программу</a>
                                                </p>
                                                @else
                                                    <a href="/files/programs/{{ $bid->program->filename }}"
                                                       class="btn btn-outline-info btn-sm">Скачать программу</a>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>
                            <td><a href="/files//{{ $school['file_name'] }}">Смотреть</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

