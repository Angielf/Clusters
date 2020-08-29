@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h3 class="display-5">{{ $user->fullname }}</h3>
            <h4 align="center">Прикрепите соглашение с образовательными организациями</h4>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                <form method="post" action="{{ route('clusters.store') }}" enctype="multipart/form-data">
                    @csrf
                    @foreach($district->users as $school)
                        @if (($school->id !== $user->id) && ($school->fullname != ''))
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    {{ $school->fullname }}
                                </div>
                                <div class="col-md-6 custom-file">
                                    <input id="custom-file-input" type="file" class="custom-file-input" name="{{ $school->id }}">
                                    <label class="custom-file-label">Загрузить соглашение</label>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    <br>
                    <button type="submit" class="btn btn-outline-primary btn-lg">Подать заявку на создание кластера</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="application/javascript">
        jQuery(document).ready(function() {
            $('.custom-file input').change(function (e) {
                var files = [];
                for (var i = 0; i < $(this)[0].files.length; i++) {
                    files.push($(this)[0].files[i].name);
                }
                $(this).next('.custom-file-label').html(files.join(', '));
            });
        })
    </script>
@endsection