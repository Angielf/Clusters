@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    {{-- <a class="btn btn-warning" href="{{ route('export') }}">Export</a> --}}

                    <div class="card-header">
                        <h2>{{$user->fullname}} <br>
                            <small>{{$user->getDistrict->fullname}}</small>
                        </h2>
                    </div>

                    <ul class="nav nav-tabs">
                        <!-- Первая вкладка (активная) -->
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#bids_with_programs">
                                Заявки, у которых уже есть утверждённая программа
                            </a>
                        </li>
                        <!-- Вторая вкладка -->
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#other">
                                Остальные
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                    <div class="tab-pane fade show active" id="bids_with_programs">
                    <ul class="card-body">

                        <ul class="list-group">

                            <li class="list-group-item">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          Организация реципиент
                                      </span>
                                    </div>
                                    <input type="text" aria-label="First name" class="form-control"
                                    id="rez" onkeyup="rez()">
                                </div>

                            </li>

                            <li class="list-group-item">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          Базовая организация
                                      </span>
                                    </div>
                                    <input type="text" aria-label="First name" class="form-control"
                                    id="bas" onkeyup="bas()">
                                </div>

                            </li>

                            <li class="list-group-item">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов
                                      </span>
                                    </div>
                                    <input type="text" aria-label="First name" class="form-control"
                                    id="classs" onkeyup="classs()">
                                </div>

                            </li>

                            <li class="list-group-item">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        Форма/условия реализации обучения/ Образовательная программа/деятельность/ Комментарий
                                      </span>
                                    </div>
                                    <input type="text" aria-label="First name" class="form-control"
                                    id="forma" onkeyup="forma()">
                                </div>

                            </li>
                        </ul>

                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">Муниципалитет</th> --}}
                                    <th scope="col">Организация реципиент</th>
                                    <th scope="col">Базовая организация</th>

                                    <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                                    <th scope="col">
                                        Форма/условия реализации обучения/ Образовательная программа/деятельность/ Комментарий
                                    </th>

                                    {{-- <th scope="col">Комментарий</th> --}}
                                    <th scope="col">Программа/ Расписание</th>
                                    <th scope="col">Кол-во учеников/Список</th>
                                    <th scope="col">Договор</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach($bids as $bid)
                                    {{-- @if(($bid->user->district == $user->getDistrict->id)) --}}
                                        @if(($bid->status === 1))
                                        @if(($bid->user->district == $user->getDistrict->id))
                                            <tr>
                                                {{-- <td>{{ $bid->user->getDistrict->fullname }}</td> --}}
                                                <td>{{ $bid->user->fullname }}</td>

                                                <td>{{ $bid->program->sender()->first()->fullname }}</td>

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
                                                    <p>{{ $bid->content }}</p>
                                                </td>

                                                {{-- <td>{{ $bid->content }}</td> --}}

                                                <td>
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <a href="/files/programs/{{ $bid->program->filename }}"
                                                                class="btn btn-outline-success">
                                                                Программа
                                                            </a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            @if(($bid->program->schedule) and ($bid->program->schedule->status === 1))
                                                                <a href="/files/schedules/{{ $bid->program->schedule->filename }}"
                                                                    class="btn btn-outline-success">
                                                                    Расписание
                                                                </a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </td>

                                                @if(($bid->program->schedule) and ($bid->program->schedule->status === 1))
                                                    <td>
                                                        {{-- @if($bid->program->schedule !== 1)
                                                            <p></p> --}}
                                                        @if($bid->program->schedule->student)
                                                            <ul class="list-group">
                                                                <li class="list-group-item">
                                                                    {{ $bid->program->schedule->student->students_amount }}
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <a href="/files/students/{{ $bid->program->schedule->student->filename }}"
                                                                        class="btn btn-outline-success">
                                                                        Список учеников
                                                                    </a>
                                                                </li>
                                                            </ul>

                                                            <td>
                                                                @if ($bid->program->schedule->student->agreement)
                                                                    <a href="/files/agreements/{{ $bid->program->schedule->student->agreement->filename }}"
                                                                    class="btn btn-outline-success">
                                                                        Договор
                                                                    </a>
                                                                @else
                                                                    <p></p>
                                                                @endif


                                                            </td>
                                                        @else
                                                            <p></p>
                                                        @endif
                                                    </td>

                                                @endif

                                            <tr>


                                        @endif
                                    @endif
                                    @endforeach


                                </tbody>
                          </table>
                    </ul>
                    </div>

                    <div class="tab-pane fade" id="other">
                        <ul class="card-body">

                            <ul class="list-group">

                                <li class="list-group-item">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                              Организация реципиент
                                          </span>
                                        </div>
                                        <input type="text" aria-label="First name" class="form-control"
                                        id="rez2" onkeyup="rez2()">
                                    </div>

                                </li>

                                <li class="list-group-item">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов
                                          </span>
                                        </div>
                                        <input type="text" aria-label="First name" class="form-control"
                                        id="classs2" onkeyup="classs2()">
                                    </div>

                                </li>

                                <li class="list-group-item">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            Форма/условия реализации обучения/ Образовательная программа/деятельность/ Комментарий
                                          </span>
                                        </div>
                                        <input type="text" aria-label="First name" class="form-control"
                                        id="forma2" onkeyup="forma2()">
                                    </div>

                                </li>
                            </ul>


                            <table class="table table-striped" id="myTable2">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">Муниципалитет</th> --}}
                                        <th scope="col">Организация реципиент</th>

                                        <th scope="col">Класс/ Предмет(курс)/ Раздел(модуль)/ Кол-во часов</th>

                                        <th scope="col">
                                            Форма/условия реализации обучения/ Образовательная программа/деятельность/ Комментарий
                                        </th>

                                        {{-- <th scope="col">Программы</th> --}}
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($bids as $bid)
                                        @if(($bid->user->district == $user->getDistrict->id))
                                            @if(($bid->status === 0) or ($bid->status === 9))
                                            <tr>
                                                {{-- <td>{{ $bid->user->getDistrict->fullname }}</td> --}}
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
                                                    <p>{{ $bid->content }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                        @endif
                                        @endforeach
                                    </tbody>
                              </table>
                        </ul>
                    </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



    <script>
        function rez() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("rez");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }


        function bas() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("bas");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }


        function classs() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("classs");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }

        function forma() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("forma");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }



        // Остальные
        function rez2() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("rez2");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable2");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }


        function classs2() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("classs2");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable2");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }

        function forma2() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("forma2");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable2");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
        </script>
@endsection
