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
                <form method="post" action="/student/{{ $schedule->id }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="student">Количество студентов:</label>
                        <input type="text" class="form-control" name="student"/>
                    </div>

                    <div class="form-group">
                        <label for="students">Список учеников</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="students">
                            <label class="custom-file-label">Загрузить</label>
                        </div>
                    </div>

                    {{-- <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="students_add">Список учеников</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="students"
                            aria-describedby="students_add" name="students">
                          <label class="custom-file-label" for="students">Выберите файл</label>
                        </div>
                    </div> --}}

                    <br>
                    <button type="submit" class="btn btn-primary">Добавить список учеников</button>
                </form>
            </div>
        </div>
    </div>
@endsection
