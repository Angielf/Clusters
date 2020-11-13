@extends('layouts.app')

@section('content')

<p>Загрузить файл в public/instructions</p>
<form method="post" action="/instruction/add" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="instruction">
            <label class="custom-file-label">Загрузить</label>
        </div>
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>


<p>Загрузить файл в public</p>
<form method="post" action="/public/add2" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="public">
            <label class="custom-file-label">Загрузить</label>
        </div>
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>


<p>Выгрузка</p>
<a class="btn btn-outline-dark" href="http://127.0.0.1:8000/download_excel.php">Excel</a>


@endsection
