@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h3 class="display-5">{{ $user->fullname }}</h3>
            <h4 align="center">Выберите образовательные организации</h4>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                <form method="post" action="/region-clusters" enctype="multipart/form-data">
                    @csrf
                    @foreach ($districts as $district)
                        <a class="btn btn-outline-dark btn-lg" data-toggle="collapse" href="#collapse{{ $district->id }}" role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            {{ $district->fullname }}
                        </a>
                        <div class="collapse" id="collapse{{ $district->id }}">
                            <div class="card card-body">
                                @foreach($district->users as $school)
                                    @if ($school->id !== $user->id)
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="schools[]" value="{{ $school->id }}">
                                                        <label class="form-check-label">{{ $school->fullname }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <br>
                    <button type="submit" class="btn btn-outline-primary btn-lg">Добавить организации
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection