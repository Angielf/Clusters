@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>{{$user->fullname}} </h2>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <a href="region-clusters/create" class="btn btn-outline-info btn-lg">Добавить организации</a>
                <table class="table table-striped">
                    <tr>
                        <th>Образовательная организация</th>
                        <th>Предмет/курс</th>
                        <th>Соглашение</th>
                    </tr>

                </table>
            </div>
        </div>
    </div>
@endsection

