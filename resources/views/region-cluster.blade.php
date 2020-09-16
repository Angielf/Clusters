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
                        <th>Заявки</th>
                    </tr>
                    @foreach ($region_clusters as $value)
                        <tr>
                            <td>{{ $value->user->fullname }}</td>
                            <td>
                                @if (isset($value->filename))
                                    <a href="/files/rc/contracts/{{ $value->filename }}" class="btn btn-outline-secondary">Смотреть</a>
                                @else
                                    <a href="/region-clusters/addcontract/{{ $value->id }}" class="btn btn-outline-info">Добавить</a>
                                @endif
                            </td>
                            <td>
                                @foreach($value->getBids() as $bid)
                                    {{ $bid->subject }} {{ $bid->getClasses() }} {{ $bid->modul }} {{ $bid->form_of_education }} {{ $bid->form_education_implementation }} {{ $bid->content }}
                                    @if ($bid->status !== 1)
                                        <a href="/program/{{ $bid->id }}"
                                           class="btn btn-outline-danger btn-sm">Добавить программу</a>
                                    @else
                                        <a href="/files/programs/{{ $bid->program->filename }}"
                                           class="btn btn-outline-success btn-sm">Программа</a>
                                        @if ($bid->program->schedule)
                                            <a href="/files/schedules/{{ $bid->program->schedule->filename }}"
                                               class="btn btn-outline-success btn-sm">Расписание</a>
                                        @else
                                            <a href="/schedule/{{ $bid->program->id }}"
                                               class="btn btn-outline-danger btn-sm">Добавить
                                                расписание</a>
                                        @endif
                                    @endif
                                    <br>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

