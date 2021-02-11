@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

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
                    @if($selected_months_hour->month_1 !== NULL)
                    <tr>
                        <td>{{$selected_months_hour->month_1 }}</td>
                        <td>{{$selected_months_hour->estimated_1 }}</td>
                        <td>
                            <ul class="list-group">
                                <li class="list-group-item">{{$selected_months_hour->real_1 }}</li>
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
                            </ul>
                        </td>
                        <td>{!! $selected_months_hour->getStatus_12() !!}</td>
                    </tr>
                    @endif

                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
