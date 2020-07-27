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
                @foreach($districts as $district)
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">{{$district->fullname}}</h2>
                        </div>
                        <div>
                            <ul class="list-group">
                                <li class="list-group-item active">
                                    <div class="row">
                                        <div class="col-md-7">Образовательная организация</div>
                                        <div class="col-md-5">Западения по предметам</div>
                                    </div>
                                </li>
                                @foreach($district->users as $school)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-7"><p>{{$school->fullname}}</p></div>
                                            <div class="col-md-5">
                                                <div class="row">
                                                    @if($bids = $school->bids)
                                                        @foreach ($bids as $bid)
                                                            <div class="col-md-6">
                                                                <p><a href="/bids/{{ $bid->id }}">{{ $bid->class }}
                                                                        класс {{ $bid->subject }} </a></p>
                                                            </div>
                                                            <div class="col-md-6">{!! $bid->getStatus() !!}</div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
