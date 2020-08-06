@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>{{$user->fullname}} <br>
                            <small>{{$user->getDistrict->fullname}}</small>
                        </h2>
                        @if ($user->cluster)
                            <p><b>Заявка на создание кластера отправлена</b></p>
                        @else
                            <a href="/clusters/create" class="btn btn-outline-primary btn-lg">Подать заявку на создание
                                кластера</a>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <ul class="card-body">
                        <h5 class="card-title">Мои заявки</h5>
                        <p class="card-text">
                        <ul>
                            @if ($user->bids)
                                @foreach( $user->bids as $bid)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                {{ $bid->class }} класс {{ $bid->subject }}
                                            </div>
                                            <div class="col-md-3">
                                                {!! $bid->getStatus() !!}
                                            </div>
                                            <div class="col-md-3">
                                                @if ($bid->status === 1)
                                                    <a href="/files/programs/{{ $bid->program->filename }}"
                                                       class="btn btn-outline-info">Скачать программу</a>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <br>
                        <a href="/bids/create" class="btn btn-outline-primary">Подать заявление</a>
                    </ul>
                    <div class="card-footer">
                        <a data-toggle="collapse" href="#collapsePrograms" aria-expanded="false"
                           aria-controls="collapsePrograms">
                            <h4>Предлагаемые программы</h4>
                        </a>
                        <div class="collapse" id="collapsePrograms">
                            @foreach( $programs as $program)
                                {{ $program->bid->subject }}
                                {{ $program->bid->class }} класс
                                {{ $program->bid->modul }}
                                <a href="/files/programs/{{ $program->filename }}">Скачать программу</a><br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
