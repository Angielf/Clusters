@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Школа</td>
                    <td>ФИО</td>
                    <td>Класс</td>
                    <td>Предмет</td>
                    <td>Комментарий</td>
                    <td>Дата подачи</td>
                </tr>
                </thead>
                <tr>
                    <td>{{$appeal->user_id}}</td>
                    <td>{{$appeal->fio}}</td>
                    <td>{{$appeal->class}}</td>
                    <td>{{$appeal->subject}}</td>
                    <td>{{$appeal->comment}}</td>
                    <td>{{$appeal->created_at}}</td>
                </tr>
            </table>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
            <form action="{{ route('appeals.update',$appeal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Время проведения аппеляции:</strong>
                            <input type="date" name="date_of_appeal" class="form-control" placeholder="Дата аппеляции">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Статус:</strong>
                            <select name="status">
                                <option value="Рассмотрение">Рассмотрение</option>
                                <option value="Одобрена">Одобрена</option>
                                <option value="Отклонена">Отклонена</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
