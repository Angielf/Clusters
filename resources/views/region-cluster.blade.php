@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>{{$user->fullname}} <br>
                            <small>{{$user->getDistrict->fullname}}</small>
                        </h2>

                    </div>


                    <ul class="card-body">
                        <h5 align="center">Дефициты организаций Воронежской области</h5>

                        <table class="table table-stripe">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Организация</th>

                                    <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                                    <th scope="col">
                                        Форма/условия реализации обучения/ Образовательная программа/деятельность
                                    </th>

                                    <th scope="col">Комментарий</th>
                                    <th scope="col">Предложить программу</th>
                                    <th scope="col">Предложить расписание</th>
                                    <th scope="col">Кол-во учеников/Список</th>
                                    <th scope="col">Договор</th>

                                </tr>
                                </thead>
                                @foreach($bids_all as $bid)
                                    @if(($bid->user_id != $user->id))
                                    <tr>
                                        <td>{{ $bid->user->fullname }}</td>

                                        <td>
                                            <p>{{ $bid->getClasses() }}</p>
                                            <p>{{ $bid->subject }}</p>
                                            <p>{{ $bid->modul }}</p>
                                            <p>{{ $bid->hours }}</p>
                                        </td>

                                        <td>
                                            <p>{{ $bid->form_of_education }}</p>
                                            <p>{{ $bid->form_education_implementation }}</p>
                                            <p>{{ $bid->getEducationalPrograms() }}</p>
                                            <p>{{ $bid->getEducationalActivities() }}</p>
                                        </td>

                                        <td>{{ $bid->content }}</td>
                                        <td>
                                            @if ($bid->status !== 1)

                                                @foreach($bid->programs() as $program)
                                                    @if($program->school_program_id === $user->id)
                                                        <p class="alert alert-info" role="alert">
                                                            Программа отправлена
                                                        </p>
                                                    @endif
                                                @endforeach

                                                <a href="/program/{{ $bid->id }}"
                                                    class="btn btn-outline-danger">
                                                    Предложить программу
                                                </a>

                                            @else
                                                @foreach($bid->programs() as $program)
                                                    @if($program->school_program_id === $user->id)
                                                        @if($program->status === 1)

                                                            <p class="alert alert-success" role="alert">
                                                                Одобрена
                                                            </p>

                                                            <a href="/files/programs/{{ $bid->program->filename }}"
                                                                class="btn btn-outline-success">
                                                                Программа
                                                            </a>

                                                            @if ($bid->program->schedule)
                                                                <td>
                                                                    @if($bid->program->schedule->status !== 2)
                                                                        <p>
                                                                            {!! $bid->program->schedule->getStatus() !!}
                                                                        </p>
                                                                        <a href="/files/schedules/{{ $bid->program->schedule->filename }}"
                                                                            class="btn btn-outline-success">
                                                                            Расписание
                                                                        </a>
                                                                    @endif
                                                                </td>
                                                                @if($bid->program->schedule->status === 1)
                                                                    <td>
                                                                        @if ($bid->program->schedule->student)
                                                                            <p>
                                                                                {{ $bid->program->schedule->student->students_amount }}
                                                                            </p>
                                                                            <a href="/files/students/{{ $bid->program->schedule->student->filename }}"
                                                                                class="btn btn-outline-success">
                                                                                Список учеников
                                                                            </a>

                                                                            <td>
                                                                                @if ($bid->program->schedule->student->agreement)
                                                                                    <a href="/files/agreements/{{ $bid->program->schedule->student->agreement->filename }}"
                                                                                        class="btn btn-outline-success">
                                                                                        Договор
                                                                                    </a>
                                                                                @endif
                                                                            </td>


                                                                        @endif
                                                                    </td>
                                                                @endif

                                                            @else
                                                                <td>
                                                                    <a href="/schedule/{{ $bid->program->id }}"
                                                                        class="btn btn-outline-danger">
                                                                        Добавить расписание
                                                                    </a>

                                                                </td>
                                                            @endif


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

                    </ul>




                    {{-- <div class="card-footer">

                    </div> --}}

                </div>
            </div>
        </div>
    </div>
@endsection
