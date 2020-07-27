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
                            <h5 class="card-title" data-toggle="collapse"
                                href="#collapse{{$district->id}}">{{$district->fullname}}</h5>
                        </div>
                        <div class="collapse" id="collapse{{$district->id}}">
                            <div class="row">
                                <div class="col-md-7">&nbsp;&nbsp;&nbsp;Образовательная организация</div>
                                <div class="col-md-5">Западения по предметам</div>
                            </div>
                            @foreach($district->users as $school)
                                <div class="row">
                                    <div class="col-md-7"><p>&nbsp;&nbsp;&nbsp; {{$school->fullname}}</p></div>
                                    <div class="col-md-5">
                                        @if($bids = $school->bids)
                                            @foreach ($bids as $bid)
                                                <a href="/bids/{{ $bid->id }}">{{ $bid->class }}
                                                        класс {{ $bid->subject }}</a><br>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
