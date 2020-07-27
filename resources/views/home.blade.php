@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                                href="#collapse{{$district->id}}">{{$district->shortname}}</h5>
                        </div>
                        <div class="collapse" id="collapse{{$district->id}}">
                            @foreach($district->users as $school)
                                <div class="row">
                                    <div class="col-md-6"><p>{{$school->fullname}}</p></div>
                                    <div class="col-md-6">
                                        @if($bids = $school->bids)
                                            @foreach ($bids as $bid)
                                                <p><a href="/bids/{{ $bid->id }}">{{ $bid->class }}
                                                        класс {{ $bid->subject }}</a></p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
