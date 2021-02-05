@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h3>Добавить учеников</h3>
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
                <form method="post" action="/selected_student/{{ $selected_schedule->id }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="selected_student">Количество студентов:</label>
                        <input type="text" class="form-control" name="selected_student"/>
                    </div>

                    <div class="form-group">
                        <label for="selected_students">Список учеников</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="selected_students">
                            <label class="custom-file-label">Загрузить</label>
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Добавить список учеников</button>
                </form>
            </div>
        </div>
    </div>
@endsection
