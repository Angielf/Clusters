@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Добавить аппеляцию</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('appeals.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="fio">ФИО:</label>
                        <input type="text" class="form-control" name="fio"/>
                    </div>

                    <div class="form-group">
                        <label for="class">Класс:</label>
                        <input type="text" class="form-control" name="class"/>
                    </div>

                    <div class="form-group">
                        <label for="subject">Предмет:</label>
                        <input type="text" class="form-control" name="subject"/>
                    </div>

                    <div class="form-group">
                        <label for="comment">Комментарий:</label>
                        <textarea class="form-control" name="comment"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Добавить аппеляцию</button>
                </form>
            </div>
        </div>
    </div>
@endsection