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
                        <th>Договор</th>
                        <th></th>
                    </tr>
                    @foreach ($region_clusters as $value)
                        <tr>
                            <td>{{ $value->user->fullname }}</td>
                            <td><a href="/files/rc/{{ $value->filename }}">Скачать</a></td>
                            <td></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

