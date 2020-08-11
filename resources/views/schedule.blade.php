@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h3>Добавить расписание</h3>
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
                <form method="post" action="/schedule/{{ $program->id }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="schedule">
                            <label class="custom-file-label">Загрузить</label>
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Добавить расписание</button>
                </form>
            </div>
        </div>
    </div>
@endsection