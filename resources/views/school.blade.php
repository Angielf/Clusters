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
                        @elseif ($user->status === 3)
                            <a href="clusters/create" class="btn btn-outline-primary btn-lg">Подать заявку на создание
                                кластера</a>
                        @else
                            <div class="alert alert-warning" role="alert">
                                К сожалению, вы не можете подавать заявку на создание образовательного кластера.
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <h2 align="center"></h2>
                    <div class="card-body">
                        <h5 class="card-title">Региональные кластеры</h5>
                        <p class="card-text">
                            @if (isset($regional_cluster))
                                {{ $regional_cluster->getClusterName() }}
                                <br>
                                <a href="region-bids/create" class="btn btn-outline-primary">Подать заявление</a>
                            @else
                                К сожалению, вы не состоите в региональных кластерах
                            @endif
                        </p>
                    </div>
                    <ul class="card-body">
                        <h5 class="card-title">Муниципальные кластеры </h5>
                        <p class="card-text">
                        {{ $user->getClusters() }}
                        <ul>
                            @if ($user->bids)
                                @foreach( $user->bids as $bid)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-3">
                                                {{ $bid->subject }} {{ $bid->modul }}
                                   -         </div>
                                            <div class="col-md-3">
                                                {!! $bid->getStatus() !!}
                                            </div>
                                            @if ($bid->status === 1)
                                                <div class="col-md-3">
                                                    <a href="/files/programs/{{ $bid->program->filename }}"
                                                       class="btn btn-outline-success">Программа</a>
                                                </div>
                                                @if ($bid->program->schedule)
                                                    <div class="col-md-3">
                                                        <a href="/files/schedules/{{ $bid->program->schedule->filename }}"
                                                           class="btn btn-outline-success">Расписание</a><br>
                                                        @if ($bid->program->schedule->status !== 1)
                                                            <a href="schedule/add/{{ $bid->program->schedule->id }}"
                                                               class="btn btn-outline-info btn-sm">Согласовать</a>
                                                            <form action="{{ action('ScheduleController@delete',$bid->program->schedule->id) }}"
                                                                  method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                        class="btn btn-outline-danger btn-sm">
                                                                    Отклонить
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <br>
                        <a href="bids/create" class="btn btn-outline-primary">Подать заявление</a>
                    </ul>
                    <a href="bids/add" class="btn btn-outline-primary">Предложить свою образовательную программу</a>
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
    </div>
@endsection
