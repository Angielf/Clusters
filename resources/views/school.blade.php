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
                                            <div class="col-md-8">
                                                {{ $bid->class }} класс {{ $bid->subject }}
                                            </div>
                                            <div class="col-md-4">
                                                {!! $bid->getStatus() !!}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <br>
                        <a href="/bids/create" class="btn btn-outline-primary">Подать заявление</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
