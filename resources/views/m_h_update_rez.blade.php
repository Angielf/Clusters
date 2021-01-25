@extends('layouts.app')

@section('content')
@if (Auth::user() && Auth::user()->id == $months_hour->schedule->program->bid->user->id)
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
                    <th scope="col">Реальное кол-во часов</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Подтвердить/ Отклонить</th>
                  </tr>
                </thead>
                <tbody>
                    @if($months_hour->month_1 !== NULL)
                    <tr>
                        <td>{{$months_hour->month_1 }}</td>
                        <td>{{$months_hour->estimated_1 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$months_hour->real_1 }}</li>
                            </ul>
                        </td>
                        <td>{!! $months_hour->getStatus_1() !!}</td>
                        <td>
                            @if($months_hour->status_1 === 9)
                            <a href="/months_hour/true1/{{ $months_hour->id }}"
                                class="btn btn-outline-info btn">
                                <i class="far fa-check-square"></i> Подтвердить
                            </a>
                            <a href="/months_hour/not1/{{ $months_hour->id }}"
                                class="btn btn-outline-danger btn">
                                <i class="far fa-check-square"></i> Отклонить
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @if($months_hour->month_2 !== NULL)
                    <tr>
                        <td>{{$months_hour->month_2 }}</td>
                        <td>{{$months_hour->estimated_2 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$months_hour->real_2 }}</li>
                            </ul>
                        </td>
                        <td>{!! $months_hour->getStatus_2() !!}</td>
                        <td>
                            @if($months_hour->status_2 === 9)
                            <a href="/months_hour/true2/{{ $months_hour->id }}"
                                class="btn btn-outline-info btn">
                                <i class="far fa-check-square"></i> Подтвердить
                            </a>
                            <a href="/months_hour/not2/{{ $months_hour->id }}"
                                class="btn btn-outline-danger btn">
                                <i class="far fa-check-square"></i> Отклонить
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @if($months_hour->month_3 !== NULL)
                    <tr>
                        <td>{{$months_hour->month_3 }}</td>
                        <td>{{$months_hour->estimated_3 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$months_hour->real_3 }}</li>
                            </ul>
                        </td>
                        <td>{!! $months_hour->getStatus_3() !!}</td>
                        <td>
                            @if($months_hour->status_3 === 9)
                            <a href="/months_hour/true3/{{ $months_hour->id }}"
                                class="btn btn-outline-info btn">
                                <i class="far fa-check-square"></i> Подтвердить
                            </a>
                            <a href="/months_hour/not3/{{ $months_hour->id }}"
                                class="btn btn-outline-danger btn">
                                <i class="far fa-check-square"></i> Отклонить
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @if($months_hour->month_4 !== NULL)
                    <tr>
                        <td>{{$months_hour->month_4 }}</td>
                        <td>{{$months_hour->estimated_4 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$months_hour->real_4 }}</li>
                            </ul>
                        </td>
                        <td>{!! $months_hour->getStatus_4() !!}</td>
                        <td>
                            @if($months_hour->status_4 === 9)
                            <a href="/months_hour/true4/{{ $months_hour->id }}"
                                class="btn btn-outline-info btn">
                                <i class="far fa-check-square"></i> Подтвердить
                            </a>
                            <a href="/months_hour/not4/{{ $months_hour->id }}"
                                class="btn btn-outline-danger btn">
                                <i class="far fa-check-square"></i> Отклонить
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @if($months_hour->month_5 !== NULL)
                    <tr>
                        <td>{{$months_hour->month_5 }}</td>
                        <td>{{$months_hour->estimated_5 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$months_hour->real_5 }}</li>
                            </ul>
                        </td>
                        <td>{!! $months_hour->getStatus_5() !!}</td>
                        <td>
                            @if($months_hour->status_5 === 9)
                            <a href="/months_hour/true5/{{ $months_hour->id }}"
                                class="btn btn-outline-info btn">
                                <i class="far fa-check-square"></i> Подтвердить
                            </a>
                            <a href="/months_hour/not5/{{ $months_hour->id }}"
                                class="btn btn-outline-danger btn">
                                <i class="far fa-check-square"></i> Отклонить
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @if($months_hour->month_6 !== NULL)
                    <tr>
                        <td>{{$months_hour->month_6 }}</td>
                        <td>{{$months_hour->estimated_6 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$months_hour->real_6 }}</li>
                            </ul>
                        </td>
                        <td>{!! $months_hour->getStatus_6() !!}</td>
                        <td>
                            @if($months_hour->status_6 === 9)
                            <a href="/months_hour/true6/{{ $months_hour->id }}"
                                class="btn btn-outline-info btn">
                                <i class="far fa-check-square"></i> Подтвердить
                            </a>
                            <a href="/months_hour/not6/{{ $months_hour->id }}"
                                class="btn btn-outline-danger btn">
                                <i class="far fa-check-square"></i> Отклонить
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @if($months_hour->month_7 !== NULL)
                    <tr>
                        <td>{{$months_hour->month_7 }}</td>
                        <td>{{$months_hour->estimated_7 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$months_hour->real_7 }}</li>
                            </ul>
                        </td>
                        <td>{!! $months_hour->getStatus_7() !!}</td>
                        <td>
                            @if($months_hour->status_7 === 9)
                            <a href="/months_hour/true7/{{ $months_hour->id }}"
                                class="btn btn-outline-info btn">
                                <i class="far fa-check-square"></i> Подтвердить
                            </a>
                            <a href="/months_hour/not7/{{ $months_hour->id }}"
                                class="btn btn-outline-danger btn">
                                <i class="far fa-check-square"></i> Отклонить
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @if($months_hour->month_8 !== NULL)
                    <tr>
                        <td>{{$months_hour->month_8 }}</td>
                        <td>{{$months_hour->estimated_8 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$months_hour->real_8 }}</li>
                            </ul>
                        </td>
                        <td>{!! $months_hour->getStatus_8() !!}</td>
                        <td>
                            @if($months_hour->status_8 === 9)
                            <a href="/months_hour/true8/{{ $months_hour->id }}"
                                class="btn btn-outline-info btn">
                                <i class="far fa-check-square"></i> Подтвердить
                            </a>
                            <a href="/months_hour/not8/{{ $months_hour->id }}"
                                class="btn btn-outline-danger btn">
                                <i class="far fa-check-square"></i> Отклонить
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @if($months_hour->month_9 !== NULL)
                    <tr>
                        <td>{{$months_hour->month_9 }}</td>
                        <td>{{$months_hour->estimated_9 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$months_hour->real_9 }}</li>
                            </ul>
                        </td>
                        <td>{!! $months_hour->getStatus_9() !!}</td>
                        <td>
                            @if($months_hour->status_9 === 9)
                            <a href="/months_hour/true9/{{ $months_hour->id }}"
                                class="btn btn-outline-info btn">
                                <i class="far fa-check-square"></i> Подтвердить
                            </a>
                            <a href="/months_hour/not9/{{ $months_hour->id }}"
                                class="btn btn-outline-danger btn">
                                <i class="far fa-check-square"></i> Отклонить
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @if($months_hour->month_10 !== NULL)
                    <tr>
                        <td>{{$months_hour->month_10 }}</td>
                        <td>{{$months_hour->estimated_10 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$months_hour->real_10 }}</li>
                            </ul>
                        </td>
                        <td>{!! $months_hour->getStatus_10() !!}</td>
                        <td>
                            @if($months_hour->status_10 === 9)
                            <a href="/months_hour/true10/{{ $months_hour->id }}"
                                class="btn btn-outline-info btn">
                                <i class="far fa-check-square"></i> Подтвердить
                            </a>
                            <a href="/months_hour/not10/{{ $months_hour->id }}"
                                class="btn btn-outline-danger btn">
                                <i class="far fa-check-square"></i> Отклонить
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @if($months_hour->month_11 !== NULL)
                    <tr>
                        <td>{{$months_hour->month_11 }}</td>
                        <td>{{$months_hour->estimated_11 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$months_hour->real_11 }}</li>
                            </ul>
                        </td>
                        <td>{!! $months_hour->getStatus_11() !!}</td>
                        <td>
                            @if($months_hour->status_11 === 9)
                            <a href="/months_hour/true11/{{ $months_hour->id }}"
                                class="btn btn-outline-info btn">
                                <i class="far fa-check-square"></i> Подтвердить
                            </a>
                            <a href="/months_hour/not11/{{ $months_hour->id }}"
                                class="btn btn-outline-danger btn">
                                <i class="far fa-check-square"></i> Отклонить
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @if($months_hour->month_12 !== NULL)
                    <tr>
                        <td>{{$months_hour->month_12 }}</td>
                        <td>{{$months_hour->estimated_12 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$months_hour->real_12 }}</li>
                            </ul>
                        </td>
                        <td>{!! $months_hour->getStatus_12() !!}</td>
                        <td>
                            @if($months_hour->status_12 === 9)
                            <a href="/months_hour/true12/{{ $months_hour->id }}"
                                class="btn btn-outline-info btn">
                                <i class="far fa-check-square"></i> Подтвердить
                            </a>
                            <a href="/months_hour/not12/{{ $months_hour->id }}"
                                class="btn btn-outline-danger btn">
                                <i class="far fa-check-square"></i> Отклонить
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif

                </tbody>
            </table>


            <!-- Модальное окно -->
            @for ($i = 1; $i <= 12; $i++)
            <div class="modal fade" id="myReal_{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabelReal_{{$i}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabelReal_{{$i}}">Реальное кол-во часов</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if($i === 1)
                            <form action="{{ action('MonthsHourController@update_real_1', $months_hour->id) }}" method="POST">
                            @elseif($i === 2)
                            <form action="{{ action('MonthsHourController@update_real_2', $months_hour->id) }}" method="POST">
                            @elseif($i === 3)
                            <form action="{{ action('MonthsHourController@update_real_3', $months_hour->id) }}" method="POST">
                            @elseif($i === 4)
                            <form action="{{ action('MonthsHourController@update_real_4', $months_hour->id) }}" method="POST">
                            @elseif($i === 5)
                            <form action="{{ action('MonthsHourController@update_real_5', $months_hour->id) }}" method="POST">
                            @elseif($i === 6)
                            <form action="{{ action('MonthsHourController@update_real_6', $months_hour->id) }}" method="POST">
                            @elseif($i === 7)
                            <form action="{{ action('MonthsHourController@update_real_7', $months_hour->id) }}" method="POST">
                            @elseif($i === 8)
                            <form action="{{ action('MonthsHourController@update_real_8', $months_hour->id) }}" method="POST">
                            @elseif($i === 9)
                            <form action="{{ action('MonthsHourController@update_real_9', $months_hour->id) }}" method="POST">
                            @elseif($i === 10)
                            <form action="{{ action('MonthsHourController@update_real_10', $months_hour->id) }}" method="POST">
                            @elseif($i === 11)
                            <form action="{{ action('MonthsHourController@update_real_11', $months_hour->id) }}" method="POST">
                            @elseif($i === 12)
                            <form action="{{ action('MonthsHourController@update_real_12', $months_hour->id) }}" method="POST">
                            @endif
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="real_{{$i}}" id="real_{{$i}}" class="form-control"" />
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
            @endfor
            {{-- Конец окна --}}


            <p><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteMonthsHour">
                <i class="far fa-trash-alt"></i> Удалить все строки
            </button></p>

            <!-- Удалить программу -->
            <div class="modal fade" id="deleteMonthsHour" tabindex="-1" aria-labelledby="deleteMonthsHourLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteMonthsHourLabel">

                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Вы уверены, что хотите удалить все строки?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Закрыть</button>
                            <form action="{{ action('MonthsHourController@delete',$months_hour->id) }}"
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

            <p><a href="{{ route('home')}}"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться на главную страницу
            </a></p>

        </div>
    </div>
</div>

@endif
@endsection
