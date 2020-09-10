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

                <h3>Кластер № {{$cluster->id}}</h3>
                <h4>{{$cluster->district->fullname}}</h4>

                {{--@if ($cluster->status === 1)--}}
                    {{--<div class="alert alert-success" role="alert">--}}
                        {{--Заяка на создание кластер одобрена--}}
                        {{--@if($cluster->agreement)--}}
                            {{--<a href="/files/agreements/{{ $cluster->agreement }}" class="btn btn-outline-success btn-sm">Соглашение--}}
                            {{--о взаимодейстии с образовательными организациями</a>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--@else--}}
                    {{--<div class="alert alert-warning" role="alert">--}}
                        {{--Заявка на создание кластера в рассмотрении--}}
                    {{--</div>--}}
                {{--@endif--}}
                <table class="table table-striped">
                    <tr>
                        <th>Образовательная организация</th>
                        <th>Предмет/курс</th>
                        <th>Договор</th>
                    </tr>
                    @foreach($schools as $school)
                        <tr>
                            <td>{{ $school['school_name'] }}</td>
                            <td width="50%">
                                @foreach($district->users as $user)
                                    @if(($user->id == $school['school_id']) && ($bids = $user->bids))
                                        @foreach ($bids as $bid)
                                            <p><a href="/bids/{{ $bid->id }}">{{ $bid->getClasses() }}
                                                    {{ $bid->subject }} {{ $bid->modul }}</a>
                                                @if ($bid->status !== 1)
                                                    <a href="/program/{{ $bid->id }}"
                                                       class="btn btn-outline-danger btn-sm">Добавить программу</a>
                                            </p>
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
                                        @endforeach
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if (isset($school['file_name']))
                                    <a href="/files/contracts/{{ $school['file_name'] }}" class="btn btn-outline-secondary">Смотреть</a>
                                @else
                                    <a href="/clusters/addcontract/{{ $school['school_id'] }}/{{ $cluster->id }}" class="btn btn-outline-info">Добавить</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="card-footer">
                    <a data-toggle="collapse" href="#collapsePrograms" aria-expanded="false"
                       aria-controls="collapsePrograms">
                        <h4>Предлагаемые программы</h4>
                    </a>
                    <div class="collapse" id="collapsePrograms">
                        @foreach( $programs as $program)
                            @php if ($program->bid->status !== 3) :
                                        $class = 'alert-success';
                                    else :
                                        $class = 'alert-info';
                                    endif;
                            @endphp
                            <div class="alert {{ $class }}" role="alert">
                                {{ $program->bid->subject }}
                                {{ $program->bid->getClasses() }} класс
                                {{ $program->bid->modul }}
                                <a href="/files/programs/{{ $program->filename }}">Скачать программу</a><br>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

