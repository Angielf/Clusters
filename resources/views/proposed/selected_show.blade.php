@extends('layouts.app')

@section('content')
@if (Auth::user() && Auth::user()->id == $selected_program->user->id)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <p><a href="{{ route('home')}}"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться на главную страницу
            </a></p>

            <table class="table table-striped">
                <tbody>
                  <tr>
                    <th scope="row">Класс/группа</th>
                    <td colspan="2">{{ $selected_program->proposed_program->getClasses() }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Предмет/курс</th>
                    <td colspan="2">{{ $selected_program->proposed_program->subject }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Раздел/модуль</th>
                    <td colspan="2">{{ $selected_program->proposed_program->modul }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Количество часов</th>
                    <td colspan="2">{{ $selected_program->proposed_program->hours }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Форма обучения</th>
                    <td colspan="2">{{ $selected_program->proposed_program->form_of_education }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Условия реализации обучения</th>
                    <td colspan="2">{{ $selected_program->proposed_program->form_education_implementation }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Образовательная программа</th>
                    <td colspan="2">{{ $selected_program->proposed_program->educational_program }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Образовательная деятельность</th>
                    <td colspan="2">{{ $selected_program->proposed_program->educational_activity }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Начало</th>
                    <td colspan="2">{{ $selected_program->proposed_program->getDataBegin() }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Конец</th>
                    <td colspan="2">{{ $selected_program->proposed_program->getDataEnd() }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Комментарий</th>
                    <td colspan="2">{{ $selected_program->proposed_program->content }}</td>
                  </tr>

                  <tr>
                    <th scope="row">Программа</th>
                    <td>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <li class="list-group-item">{{ $selected_program->proposed_program->user->fullname }}</li>
                                </h6>
                                <p>
                                    <a href="/files/proposed_programs/{{ $selected_program->proposed_program->filename }}"
                                        class="btn btn-outline-success">
                                        Программа
                                    </a>
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if ($selected_program->selected_schedule === NULL)
                            <p><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteProgram">
                                <i class="far fa-trash-alt"></i> Удалить из таблицы эту образовательную программу
                            </button></p>

                            <!-- Удалить программу -->
                            <div class="modal fade" id="deleteProgram" tabindex="-1" aria-labelledby="deleteProgramLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Вы уверены, что хотите удалить из таблицы эту образовательную программу?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Закрыть</button>
                                            <form action="{{ action('SelectedProgramController@delete',$selected_program->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-outline-success btn">
                                                    Да
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                  </tr>

                  @if(($selected_program->selected_schedule) and ($selected_program->selected_schedule->status === 1))
                  <tr>
                    <th scope="row">Расписание</th>
                    <td>
                        <p><a href="/files/selected_schedules/{{ $selected_program->selected_schedule->filename }}"
                            class="btn btn-outline-success">
                            Расписание
                        </a><br></p>
                    </td>
                    <td>
                        @if (($selected_program->selected_schedule->selected_student === NULL)
                        // and ($bid->programs()->sortByDesc('status')->first()->schedule->months_hour === NULL)
                        and ($selected_program->selected_schedule->status === 1))
                            <p><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteSchedule">
                                <i class="far fa-trash-alt"></i> Удалить расписание
                            </button></p>

                            <!-- Удалить расписание -->
                            <div class="modal fade" id="deleteSchedule" tabindex="-1" aria-labelledby="deleteScheduleLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                Вы уверены, что хотите удалить расписание?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Закрыть</button>
                                                <form action="{{ action('SelectedScheduleController@delete',$selected_program->selected_schedule->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-outline-success btn">
                                                        Да
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                  </tr>
                  @endif


                  {{-- @if(($bid->programs()->sortByDesc('status')->first()->schedule) and ($bid->programs()->sortByDesc('status')->first()->schedule->status === 1) and ($bid->programs()->sortByDesc('status')->first()->schedule->months_hour))
                  <tr>
                    <th scope="row">Кол-во часов по месяцам</th>
                    <td>
                        <p><a href="/months_hours/{{ $bid->programs()->sortByDesc('status')->first()->schedule->months_hour->id }}/update-rez"
                            class="btn btn-outline-info btn">
                                Кол-во часов по месяцам
                        </a><br></p>
                    </td>
                    <td>
                        @if (($bid->programs()->sortByDesc('status')->first()->schedule->status === 1))
                            <p><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteMonthsHour">
                                <i class="far fa-trash-alt"></i> Удалить кол-во часов по месяцам
                            </button></p> --}}

                            <!-- Удалить кол-во часов по месяцам -->
                            {{-- <div class="modal fade" id="deleteMonthsHour" tabindex="-1" aria-labelledby="deleteMonthsHourLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteMonthsHourLabel">
                                                {{ $bid->getClasses() }}; {{ $bid->subject }}; {{ $bid->modul }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                Вы уверены, что хотите удалить кол-во часов по месяцам?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Закрыть</button>
                                                <form action="{{ action('MonthsHourController@delete',$bid->programs()->sortByDesc('status')->first()->schedule->months_hour->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-outline-success btn">
                                                        Да
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                  </tr>
                  @endif --}}


                  @if(($selected_program->selected_schedule) and ($selected_program->selected_schedule->status === 1) and ($selected_program->selected_schedule->selected_student))
                  <tr>
                    <th scope="row">Кол-во/ Список учеников</th>
                    <td>
                        <p>{{ $selected_program->selected_schedule->selected_student->students_amount }}</p>
                        <p><a href="/files/selected_students/{{ $selected_program->selected_schedule->selected_student->filename }}"
                            class="btn btn-outline-success">
                                Список учеников
                            </a><br></p>
                    </td>
                    <td>
                        @if ($selected_program->selected_schedule->selected_student->selected_agreement === NULL)
                            <p><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteStudents">
                                <i class="far fa-trash-alt"></i> Удалить список учеников
                            </button></p>

                            <!-- Удалить список учеников и их количество -->
                            <div class="modal fade" id="deleteStudents" tabindex="-1" aria-labelledby="deleteStudentsLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Вы уверены, что хотите удалить список учеников и их количество?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Закрыть</button>
                                                <form action="{{ action('SelectedStudentController@delete',$selected_program->selected_schedule->selected_student->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-outline-success btn">
                                                        Да
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                  </tr>
                  @endif


                  @if(($selected_program->selected_schedule) and ($selected_program->selected_schedule->status === 1) and ($selected_program->selected_schedule->selected_student) and ($selected_program->selected_schedule->selected_student->selected_agreement))
                  <tr>
                    <th scope="row">Договор</th>
                    <td>
                        <a href="/files/selected_agreements/{{ $selected_program->selected_schedule->selected_student->selected_agreement->filename }}"
                            class="btn btn-outline-success">
                            Договор
                        </a>
                    </td>
                    <td>
                        <p><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteAgreement">
                            <i class="far fa-trash-alt"></i> Удалить договор
                        </button></p>

                        <!-- Удалить Договор -->
                        <div class="modal fade" id="deleteAgreement" tabindex="-1" aria-labelledby="deleteAgreementLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Вы уверены, что хотите удалить договор?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Закрыть</button>
                                        <form action="{{ action('SelectedAgreementController@delete',$selected_program->selected_schedule->selected_student->selected_agreement->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-outline-success btn">
                                                Да
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                  </tr>
                  @endif
                </tbody>
            </table>

            <p><a href="{{ route('home')}}"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться на главную страницу
            </a></p>

        </div>
    </div>
</div>

@endif
@endsection
