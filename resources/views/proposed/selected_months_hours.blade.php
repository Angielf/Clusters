@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <p><a href="{{ route('home')}}"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться на главную страницу
            </a></p>

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Месяц</th>
                    <th scope="col">Предполагаемое кол-во часов</th>
                    {{-- <th scope="col">Добавить ещё одну строку</th> --}}
                  </tr>
                </thead>
                <tbody>
                    <form method="post" action="/selected_months_hours/{{ $selected_schedule->id }}" enctype="multipart/form-data">
                        @csrf
                        @for ($i = 1; $i <= 12; $i++)
                        <tr>
                            <th scope="row">
                                <div class="form-group">
                                    <input type="month" class="form-control" data-date-format="mm/yyyy" name="month_{{$i}}"/>
                                    <small class="form-text text-muted">нажмите на значок справа</small>
                                </div>
                            </th>
                            <td>
                                <input type="text" class="form-control" name="estimated_{{$i}}"/>
                            </td>
                            {{-- <td></td> --}}
                        </tr>
                        @endfor

                        <br>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </tbody>
              </table>


              <p><a href="{{ route('home')}}"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться на главную страницу
            </a></p>

        </div>
    </div>
</div>

@endsection
