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
                                <p>{{$school->fullname}}</p>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
