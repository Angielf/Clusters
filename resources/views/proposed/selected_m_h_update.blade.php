@extends('layouts.app')

@section('content')
@if (Auth::user()
&& Auth::user()->id == $selected_months_hour->selected_schedule->selected_program->proposed_program->user_id
)
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
                  </tr>
                </thead>
                <tbody>
                    {{-- @for ($i = 1; $i <= 12; $i++) --}}
                    @if($selected_months_hour->month_1 !== NULL)
                    <tr>
                        <td>{{$selected_months_hour->month_1 }}</td>
                        <td>{{$selected_months_hour->estimated_1 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$selected_months_hour->real_1 }}</li>
                                @if($selected_months_hour->status_1 !== 1)
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myReal_1">
                                        <i class="far fa-edit"></i> Изменить
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </td>
                        <td>{!! $selected_months_hour->getStatus_1() !!}</td>
                    </tr>
                    @endif
                    @if($selected_months_hour->month_2 !== NULL)
                    <tr>
                        <td>{{$selected_months_hour->month_2 }}</td>
                        <td>{{$selected_months_hour->estimated_2 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$selected_months_hour->real_2 }}</li>
                                @if($selected_months_hour->status_2 !== 1)
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myReal_2">
                                        <i class="far fa-edit"></i> Изменить
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </td>
                        <td>{!! $selected_months_hour->getStatus_2() !!}</td>
                    </tr>
                    @endif
                    @if($selected_months_hour->month_3 !== NULL)
                    <tr>
                        <td>{{$selected_months_hour->month_3 }}</td>
                        <td>{{$selected_months_hour->estimated_3 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$selected_months_hour->real_3 }}</li>
                                @if($selected_months_hour->status_3 !== 1)
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myReal_3">
                                        <i class="far fa-edit"></i> Изменить
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </td>
                        <td>{!! $selected_months_hour->getStatus_3() !!}</td>
                    </tr>
                    @endif
                    @if($selected_months_hour->month_4 !== NULL)
                    <tr>
                        <td>{{$selected_months_hour->month_4 }}</td>
                        <td>{{$selected_months_hour->estimated_4 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$selected_months_hour->real_4 }}</li>
                                @if($selected_months_hour->status_4 !== 1)
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myReal_4">
                                        <i class="far fa-edit"></i> Изменить
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </td>
                        <td>{!! $selected_months_hour->getStatus_4() !!}</td>
                    </tr>
                    @endif
                    @if($selected_months_hour->month_5 !== NULL)
                    <tr>
                        <td>{{$selected_months_hour->month_5 }}</td>
                        <td>{{$selected_months_hour->estimated_5 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$selected_months_hour->real_5 }}</li>
                                @if($selected_months_hour->status_5 !== 1)
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myReal_5">
                                        <i class="far fa-edit"></i> Изменить
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </td>
                        <td>{!! $selected_months_hour->getStatus_5() !!}</td>
                    </tr>
                    @endif
                    @if($selected_months_hour->month_6 !== NULL)
                    <tr>
                        <td>{{$selected_months_hour->month_6 }}</td>
                        <td>{{$selected_months_hour->estimated_6 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$selected_months_hour->real_6 }}</li>
                                @if($selected_months_hour->status_6 !== 1)
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myReal_6">
                                        <i class="far fa-edit"></i> Изменить
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </td>
                        <td>{!! $selected_months_hour->getStatus_6() !!}</td>
                    </tr>
                    @endif
                    @if($selected_months_hour->month_7 !== NULL)
                    <tr>
                        <td>{{$selected_months_hour->month_7 }}</td>
                        <td>{{$selected_months_hour->estimated_7 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$selected_months_hour->real_7 }}</li>
                                @if($selected_months_hour->status_7 !== 1)
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myReal_7">
                                        <i class="far fa-edit"></i> Изменить
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </td>
                        <td>{!! $selected_months_hour->getStatus_7() !!}</td>
                    </tr>
                    @endif
                    @if($selected_months_hour->month_8 !== NULL)
                    <tr>
                        <td>{{$selected_months_hour->month_8 }}</td>
                        <td>{{$selected_months_hour->estimated_8 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$selected_months_hour->real_8 }}</li>
                                @if($selected_months_hour->status_8 !== 1)
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myReal_8">
                                        <i class="far fa-edit"></i> Изменить
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </td>
                        <td>{!! $selected_months_hour->getStatus_8() !!}</td>
                    </tr>
                    @endif
                    @if($selected_months_hour->month_9 !== NULL)
                    <tr>
                        <td>{{$selected_months_hour->month_9 }}</td>
                        <td>{{$selected_months_hour->estimated_9 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$selected_months_hour->real_9 }}</li>
                                @if($selected_months_hour->status_9 !== 1)
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myReal_9">
                                        <i class="far fa-edit"></i> Изменить
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </td>
                        <td>{!! $selected_months_hour->getStatus_9() !!}</td>
                    </tr>
                    @endif
                    @if($selected_months_hour->month_10 !== NULL)
                    <tr>
                        <td>{{$selected_months_hour->month_10 }}</td>
                        <td>{{$selected_months_hour->estimated_10 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$selected_months_hour->real_10 }}</li>
                                @if($selected_months_hour->status_10 !== 1)
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myReal_10">
                                        <i class="far fa-edit"></i> Изменить
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </td>
                        <td>{!! $selected_months_hour->getStatus_10() !!}</td>
                    </tr>
                    @endif
                    @if($selected_months_hour->month_11 !== NULL)
                    <tr>
                        <td>{{$selected_months_hour->month_11 }}</td>
                        <td>{{$selected_months_hour->estimated_11 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$selected_months_hour->real_11 }}</li>
                                @if($selected_months_hour->status_11 !== 1)
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myReal_11">
                                        <i class="far fa-edit"></i> Изменить
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </td>
                        <td>{!! $selected_months_hour->getStatus_11() !!}</td>
                    </tr>
                    @endif
                    @if($selected_months_hour->month_12 !== NULL)
                    <tr>
                        <td>{{$selected_months_hour->month_12 }}</td>
                        <td>{{$selected_months_hour->estimated_12 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$selected_months_hour->real_12 }}</li>
                                @if($selected_months_hour->status_12 !== 1)
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myReal_12">
                                        <i class="far fa-edit"></i> Изменить
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </td>
                        <td>{!! $selected_months_hour->getStatus_12() !!}</td>
                    </tr>
                    @endif
                    {{-- @endfor --}}

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
                            <form action="{{ action('SelectedMonthsHourController@update_real_1', $selected_months_hour->id) }}" method="POST">
                            @elseif($i === 2)
                            <form action="{{ action('SelectedMonthsHourController@update_real_2', $selected_months_hour->id) }}" method="POST">
                            @elseif($i === 3)
                            <form action="{{ action('SelectedMonthsHourController@update_real_3', $selected_months_hour->id) }}" method="POST">
                            @elseif($i === 4)
                            <form action="{{ action('SelectedMonthsHourController@update_real_4', $selected_months_hour->id) }}" method="POST">
                            @elseif($i === 5)
                            <form action="{{ action('SelectedMonthsHourController@update_real_5', $selected_months_hour->id) }}" method="POST">
                            @elseif($i === 6)
                            <form action="{{ action('SelectedMonthsHourController@update_real_6', $selected_months_hour->id) }}" method="POST">
                            @elseif($i === 7)
                            <form action="{{ action('SelectedMonthsHourController@update_real_7', $selected_months_hour->id) }}" method="POST">
                            @elseif($i === 8)
                            <form action="{{ action('SelectedMonthsHourController@update_real_8', $selected_months_hour->id) }}" method="POST">
                            @elseif($i === 9)
                            <form action="{{ action('SelectedMonthsHourController@update_real_9', $selected_months_hour->id) }}" method="POST">
                            @elseif($i === 10)
                            <form action="{{ action('SelectedMonthsHourController@update_real_10', $selected_months_hour->id) }}" method="POST">
                            @elseif($i === 11)
                            <form action="{{ action('SelectedMonthsHourController@update_real_11', $selected_months_hour->id) }}" method="POST">
                            @elseif($i === 12)
                            <form action="{{ action('SelectedMonthsHourController@update_real_12', $selected_months_hour->id) }}" method="POST">
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

            <!-- Удалить часы -->
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
                            <form action="{{ action('SelectedMonthsHourController@delete',$selected_months_hour->id) }}"
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
