@extends('layouts.app')

@section('content')
@if (Auth::user() && Auth::user()->id == $proposed_program->user->id)
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
                    <td>{{ $proposed_program->getClasses() }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myClass">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Предмет/курс</th>
                    <td>{{ $proposed_program->subject }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#mySubject">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Раздел/модуль</th>
                    <td>{{ $proposed_program->modul }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModul">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Количество часов</th>
                    <td>{{ $proposed_program->hours }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myHours">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Форма обучения</th>
                    <td>{{ $proposed_program->form_of_education }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myFormOfEducation">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Условия реализации обучения</th>
                    <td>{{ $proposed_program->form_education_implementation }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myFormEducationImplementation">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Образовательная программа</th>
                    <td>{{ $proposed_program->educational_program }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myEducationalProgram">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Образовательная деятельность</th>
                    <td>{{ $proposed_program->educational_activity }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myEducationalActivity">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Начало</th>
                    <td>{{ $proposed_program->getDataBegin() }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myDateBegin">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Конец</th>
                    <td>{{ $proposed_program->getDataEnd() }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myDateEnd">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Комментарий</th>
                    <td>{{ $proposed_program->content }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myContent">
                            <i class="far fa-edit"></i> Изменить
                        </button>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">Программа</th>
                    <td>
                        <a href="/files/proposed_programs/{{ $proposed_program->filename }}"
                            class="btn btn-outline-success">
                                Программа
                        </a>
                    </td>
                    <td>
                        @if ($proposed_program->selected_program === NULL)
                            <p><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteProgram">
                                <i class="far fa-trash-alt"></i> Удалить программу
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
                                            Вы уверены, что хотите удалить эту образовательную программу?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Закрыть</button>
                                            <form action="{{ action('ProposedController@delete_proposed',$proposed_program->id) }}"
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

                </tbody>
            </table>

            <p><a href="{{ route('home')}}"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться на главную страницу
            </a></p>


            <!-- Модальное окно Класс/группа-->
            <div class="modal fade" id="myClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabelClass" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelClass">Класс/группа</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('ProposedController@update_class', $proposed_program->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="class[]" id='selectid'>
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="смешанная группа" id="smesh">смешанная группа</option>
                                    </select>
                                </div>

                                <ul class="list-group" id="mix"
                                style="margin:0 auto; display:none;"
                                >
                                    <label for="class">Выберите классы для смешанной группы:</label>
                                    <li class="list-group-item">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="1">
                                            <label class="form-check-label">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="2">
                                            <label class="form-check-label">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="3">
                                            <label class="form-check-label">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="4">
                                            <label class="form-check-label">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="5">
                                            <label class="form-check-label">5</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="6">
                                            <label class="form-check-label">6</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="7">
                                            <label class="form-check-label">7</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="8">
                                            <label class="form-check-label">8</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="9">
                                            <label class="form-check-label">9</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="10">
                                            <label class="form-check-label">10</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="class[]" type="checkbox" value="11">
                                            <label class="form-check-label">11</label>
                                        </div>
                                    </li>
                                </ul>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Класс/группа --}}


            <!-- Модальное окно Предмет/курс-->
            <div class="modal fade" id="mySubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabelSubject" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelSubject">Предмет/курс</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('ProposedController@update_subject', $proposed_program->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="subject" id="subject" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Предмет/курс --}}


            <!-- Модальное окно Раздел/модуль-->
            <div class="modal fade" id="myModul" tabindex="-1" role="dialog" aria-labelledby="myModalLabelModul" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelModul">Раздел/модуль</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('ProposedController@update_modul', $proposed_program->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="modul" id="modul" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Раздел/модуль --}}

            <!-- Модальное окно Количество часов-->
            <div class="modal fade" id="myHours" tabindex="-1" role="dialog" aria-labelledby="myModalLabelHours" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelHours">Количество часов</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('ProposedController@update_hours', $proposed_program->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="hours" id="hours" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Количество часов --}}

            <!-- Модальное окно Форма обучения-->
            <div class="modal fade" id="myFormOfEducation" tabindex="-1" role="dialog" aria-labelledby="myFormOfEducation" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelFormOfEducation">Форма обучения</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('ProposedController@update_form_of_education', $proposed_program->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="form_of_education">
                                        <option value=""></option>
                                        <option value="очная">очная</option>
                                        <option value="очно-заочная">очно-заочная</option>
                                        <option value="заочная">заочная</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Форма обучения --}}


            <!-- Модальное окно Условия реализации обучения-->
            <div class="modal fade" id="myFormEducationImplementation" tabindex="-1" role="dialog" aria-labelledby="myFormEducationImplementation" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelFormEducationImplementation">Условия реализации обучения</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('ProposedController@update_form_education_implementation', $proposed_program->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="form_education_implementation">
                                        <option value=""></option>
                                        <option value="с использование дистанционных образовательных технологий, электронного обучения">с использование дистанционных образовательных технологий, электронного обучения</option>

                                        <option value="трансфер детей до организации">трансфер детей до организации</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Условия реализации обучения --}}


            <!-- Модальное окно Образовательная программа-->
            <div class="modal fade" id="myEducationalProgram" tabindex="-1" role="dialog" aria-labelledby="myEducationalProgram" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelEducationalProgram">Образовательная программа</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('ProposedController@update_educational_program', $proposed_program->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="educational_program">
                                        <option value=""></option>
                                        <option value="основная">основная</option>

                                        <option value="дополнительная">дополнительная</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Образовательная программа --}}


            <!-- Модальное окно Образовательная деятельность-->
            <div class="modal fade" id="myEducationalActivity" tabindex="-1" role="dialog" aria-labelledby="myEducationalActivity" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelEducationalActivity">Образовательная деятельность</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('ProposedController@update_educational_activity', $proposed_program->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="educational_activity">
                                        <option value=""></option>
                                        <option value="урочная">урочная</option>

                                        <option value="внеурочная">внеурочная</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Образовательная деятельность --}}


            <!-- Модальное окно Начало-->
            <div class="modal fade" id="myDateBegin" tabindex="-1" role="dialog" aria-labelledby="myDateBegin" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelDateBegin">Начало</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('ProposedController@update_date_begin', $proposed_program->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="date" class="form-control" data-date-format="dd/mm/yyyy" name="date_begin"/>
                                    <small class="form-text text-muted">нажмите на значок справа</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Начало --}}


            <!-- Модальное окно Конец-->
            <div class="modal fade" id="myDateEnd" tabindex="-1" role="dialog" aria-labelledby="myDateEnd" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelDateEnd">Конец</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('ProposedController@update_date_end', $proposed_program->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="date" class="form-control" data-date-format="dd/mm/yyyy" name="date_end"/>
                                    <small class="form-text text-muted">нажмите на значок справа</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Конец --}}


            <!-- Модальное окно Комментарий-->
            <div class="modal fade" id="myContent" tabindex="-1" role="dialog" aria-labelledby="myContent" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelContent">Комментарий</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('ProposedController@update_content', $proposed_program->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="content"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Конец окна Комментарий --}}



        </div>
    </div>
</div>

<script>
    $(function() {
        $("#selectid").change(function() {
            if ($("#smesh").is(":selected")) {
                $("#mix").show();
            }
            else {
                $("#mix").hide();
            }
        }).trigger('change');
    });
</script>
@endif
@endsection
