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
                        {{-- @if ($user->cluster)
                            <p><b>Заявка на создание кластера отправлена</b></p>
                        @elseif ($user->status === 3)
                            <a href="clusters/create" class="btn btn-outline-primary btn-lg">Подать заявку на создание
                                кластера</a>
                        @elseif ($user->status === 5)
                            <div class="alert alert-light" role="alert">
                                Заявка на базовую школу отправлена
                            </div>
                        @else
                            <a href="clusters/requestbaseschool/{{ $user->id }}" class="btn btn-outline-info btn">Подать
                                заявку на базовую школу</a>
                        @endif --}}
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    {{-- <h2 align="center"></h2>
                    <div class="card-body">
                        <h5 class="card-title">Региональные кластеры</h5>
                        <p class="card-text">
                        @if (isset($regional_cluster))
                            {{ $regional_cluster->getClusterName() }}
                            @foreach($user->regionBids() as $bid)
                                <p>{{ $bid->subject }} {{ $bid->modul }}
                                    @if ($bid->status === 1)
                                        <a href="/files/programs/{{ $bid->program->filename }}"
                                           class="btn btn-outline-success btn-sm">Программа</a>
                                        @if ($bid->program->schedule)
                                            <a href="/files/schedules/{{ $bid->program->schedule->filename }}"
                                               class="btn btn-outline-success btn-sm">Расписание</a>
                                        @endif
                                    @endif
                                </p>
                            @endforeach
                            <br>
                            <a href="/bids/createrc/{{ $regional_cluster->id }}" class="btn btn-outline-primary">
                                Подать заявление на дефицит
                            </a>
                        @else
                            К сожалению, вы не состоите в региональных кластерах
                            @endif
                            </p>
                    </div> --}}


                    <ul class="card-body">

                        <a href="bids/create" class="btn btn-outline-primary btn-block">
                            Подать заявление на дефицит
                        </a>
                        <br>

                        <h5 align="center">Ваши заявления на дефицит</h5>

                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Предмет/курс</th>
                                <th scope="col">Статус заявки</th>
                                <th scope="col">Заявка</th>
                                <th scope="col">Расписание</th>
                                <th scope="col">Список учеников</th>
                                <th scope="col">Количество учеников</th>
                                <th scope="col">Договор</th>
                              </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    @if ($user->bids())
                                        @foreach( $user->bids() as $bid)
                                        <tr>
                                            <td>
                                                {{ $bid->getClasses() }} {{ $bid->subject }} {{ $bid->modul }}
                                            </td>
                                            <td>
                                                {!! $bid->getStatus() !!}
                                            </td>
                                            {{-- @if ($bid->status !== 1) --}}
                                                <td>
                                                    @if ($bid->status === 9)
                                                        @foreach($bid->programs() as $program)

                                                            @if ($program->status !== 2)
                                                                <div class="card" style="width: 18rem;">
                                                                    <div class="card-body">
                                                                        <h6 class="card-title">
                                                                            {{$program->sender()->first()->fullname}}
                                                                        </h6>
                                                                        <p>
                                                                            <a href="/files/programs/{{ $program->filename }}"
                                                                                class="btn btn-outline-success">
                                                                                Программа
                                                                            </a>
                                                                            @if ($program->status !== 1)
                                                                                <p>
                                                                                    <a href="program/add/{{ $program->id }}"
                                                                                        class="btn btn-outline-info btn">
                                                                                        Согласовать
                                                                                    </a>
                                                                                <p>

                                                                                <form action="{{ action('ProgramController@delete',$program->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="btn btn-outline-danger btn">
                                                                                        Отклонить
                                                                                    </button>
                                                                                </form>
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                             @endif

                                                        @endforeach

                                                    @elseif($bid->status === 1)
                                                        @foreach($bid->programs() as $program)
                                                            @if($program->status === 1)
                                                            <div class="card" style="width: 18rem;">
                                                                <div class="card-body">
                                                                    <h6 class="card-title">
                                                                        {{$program->sender()->first()->fullname}}
                                                                    </h6>
                                                                    <p>
                                                                        <a href="/files/programs/{{ $program->filename }}"
                                                                            class="btn btn-outline-success">
                                                                            Программа
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                </td>
                                                {{-- @endif --}}

                                                @if (($bid->status === 1) and ($bid->program->schedule))
                                                    <td>
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
                                                    </td>

                                                    @if($bid->program->schedule->status === 1)
                                                    <td>
                                                        @if ($bid->program->schedule->student)
                                                            <a href="/files/students/{{ $bid->program->schedule->student->filename }}"
                                                                class="btn btn-outline-success">
                                                                Список учеников
                                                            </a>
                                                        @else
                                                            <a href="/student/{{ $bid->program->schedule->id }}"
                                                                class="btn btn-outline-danger btn-sm">
                                                                    Добавить список учеников
                                                            </a>
                                                        @endif
                                                    </td>
                                                    @endif

                                                @endif

                                        </tr>
                                        @endforeach
                                    @endif

                                </tr>
                            </tbody>
                          </table>

                    </ul>


                    <a href="bids/add" class="btn btn-outline-primary btn-block">
                        Предложить образовательную программу
                    </a>
                    <br>

                    <h5 align="center">Предлагаемые вами программы</h5>

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <td>Класс</td>
                            <td>Предмет/курс</td>
                            <td>Раздел/модуль</td>
                            <td>Форма обучения</td>
                            <td>Условия реализации обучения</td>
                            <td>Комментарий</td>
                            <td>Файл</td>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach( $programs as $program)

                            {{-- ???? --}}
                            {{-- @if($program->bid->user_id = $user->id) --}}

                                {{-- @php if ($program->bid->status !== 3) :
                                    $class = 'alert-success';
                                else :
                                    $class = 'alert-info';
                                endif;
                                @endphp --}}
                                <tr>
                                    {{-- <td>
                                        {{ $program->bid->getClasses() }}
                                    </td>
                                    <td>
                                        {{ $program->bid->subject }}
                                    </td>
                                    <td>
                                        {{ $program->bid->modul }}
                                    </td>
                                    <td>{{ $program->bid->form_of_education }}</td>
                                    <td>{{ $program->bid->form_education_implementation }}</td>
                                    <td>{{ $program->bid->content }}</td>
                                    <td><a href="/files/programs/{{ $program->filename }}">Скачать программу</a></td> --}}
                                </tr>

                            {{-- @endif --}}
                            @endforeach
                        </tbody>
                    </table>


                    <div class="card-footer">
                        <div class="accordion" id="accordionExample">

                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapsePrograms" aria-expanded="false"
                                    aria-controls="collapsePrograms">
                                        Предлагаемые программы других школ вашего муниципалитета
                                    </a>
                                </h5>
                              </div>

                              <div id="collapsePrograms" class="collapse"
                                    aria-labelledby="collapsePrograms" data-parent="#accordionExample">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <td>Класс</td>
                                            <td>Предмет/курс</td>
                                            <td>Раздел/модуль</td>
                                            <td>Форма обучения</td>
                                            <td>Условия реализации обучения</td>
                                            <td>Комментарий</td>
                                            <td>Файл</td>
                                            <td>Взять программу</td>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach( $programs as $program)
                                            @if($program->bid->user_id != $user->id)
                                                {{-- @php if ($program->bid->status !== 3) :
                                                    $class = 'alert-success';
                                                else :
                                                    $class = 'alert-info';
                                                endif;
                                                @endphp --}}
                                                <tr class="alert alert-info" role="alert">
                                                    {{-- <td>
                                                        {{ $program->bid->getClasses() }}
                                                    </td>
                                                    <td>
                                                        {{ $program->bid->subject }}
                                                    </td>
                                                    <td>
                                                        {{ $program->bid->modul }}
                                                    </td>
                                                    <td>{{ $program->bid->form_of_education }}</td>
                                                    <td>{{ $program->bid->form_education_implementation }}</td>
                                                    <td>{{ $program->bid->content }}</td>
                                                    <td><a href="/files/programs/{{ $program->filename }}">Скачать программу</a></td>
                                                    <td></td> --}}
                                                </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                  <h5 class="mb-0">
                                      <a data-toggle="collapse" href="#collapseDeficits" aria-expanded="false"
                                      aria-controls="collapseDeficits">
                                          Дефициты других школ вашего муниципалитета
                                      </a>
                                  </h5>
                                </div>

                                <div id="collapseDeficits" class="collapse"
                                      aria-labelledby="collapseDeficits" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <table class="table table-stripe" id="collapseExample3">
                                        <thead>
                                        <tr>
                                            <td>Организация</td>
                                            <td>Класс</td>
                                            <td>Предмет/курс</td>
                                            <td>Раздел/модуль</td>
                                            <td>Форма обучения</td>
                                            <td>Условия реализации обучения</td>
                                            <td>Комментарий</td>
                                            <td>Предложить программу</td>
                                            <td>Предложить расписание</td>
                                        </tr>
                                        </thead>
                                        @foreach($bids_all as $bid)
                                            @if(($bid->user_id != $user->id) and ($bid->user->district == $user->getDistrict->id))
                                            <tr>
                                                <td>{{ $bid->user->fullname }}</td>
                                                <td>{{ $bid->getClasses() }}</td>
                                                <td>{{ $bid->subject }}</td>
                                                <td>{{ $bid->modul }}</td>
                                                <td>{{ $bid->form_of_education }}</td>
                                                <td>{{ $bid->form_education_implementation }}</td>
                                                <td>{{ $bid->content }}</td>
                                                <td>
                                                    @if ($bid->status !== 1)
                                                        {{-- @if()

                                                        @endif --}}
                                                        <a href="/program/{{ $bid->id }}"
                                                            class="btn btn-outline-danger btn-sm">
                                                            Добавить программу
                                                        </a>
                                                    @else
                                                        @foreach($bid->programs() as $program)
                                                            @if($program->school_program_id === $user->id)
                                                                @if($program->status === 1)
                                                                    <p>
                                                                        {!! $bid->program->getStatus() !!}
                                                                    </p>

                                                                    <a href="/files/programs/{{ $bid->program->filename }}"
                                                                        class="btn btn-outline-success btn-sm">
                                                                        Программа
                                                                    </a>

                                                                    <td>
                                                                        @if ($bid->program->schedule)
                                                                            @if($bid->program->schedule->status !== 2)
                                                                                <p>
                                                                                    {!! $bid->program->schedule->getStatus() !!}
                                                                                </p>
                                                                                <a href="/files/schedules/{{ $bid->program->schedule->filename }}"
                                                                                    class="btn btn-outline-success btn-sm">
                                                                                    Расписание
                                                                                </a>
                                                                            @endif
                                                                        @else
                                                                            <a href="/schedule/{{ $bid->program->id }}"
                                                                                class="btn btn-outline-danger btn-sm">
                                                                                Добавить расписание
                                                                            </a>
                                                                        @endif
                                                                    </td>


                                                                @elseif($program->status === 2)
                                                                    <p>
                                                                        <div class="alert alert-danger">
                                                                            Программа отклонена
                                                                        </div>
                                                                    </p>
                                                                @endif
                                                            @endif
                                                        @endforeach

                                                    @endif

                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                  </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
