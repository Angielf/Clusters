@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="alert alert-secondary" role="alert">
                <h2 data-toggle="collapse" href="#collapseExample1">Региональные кластеры</h2>
            </div>
            <table class="table table-stripe collapse" id="collapseExample1">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Базовая школа</th>
                    <th>Школы реципиенты</th>
                    <th>Заявки</th>
                </tr>
                </thead>
                @foreach($region_clusters as $cluster)
                    <tr>
                        <td>{{$cluster->id}}</td>
                        <td>{{$cluster->getClusterName()}}</td>
                        <td>{{$cluster->user->fullname}}
                            @if (isset($cluster->filename))
                                <a href="/files/rc/contracts/{{ $cluster->filename }}">Договор</a>
                            @endif
                        </td>
                        <td>
                            @forelse( $cluster->getBids() as $bid )
                                {{ $bid->subject }} {{ $bid->getClasses() }}
                                класс {{ $bid->modul }} {{ $bid->form_of_education }} {{ $bid->form_education_implementation }}
                                @if ($bid->status === 1)
                                    <a href="/files/programs/{{ $bid->program->filename }}"
                                       class="btn btn-outline-success btn-sm">Программа</a>
                                @endif
                            @empty
                                Заявок нет
                            @endforelse
                        </td>
                    </tr>
                @endforeach
            </table>
            <br>
            <div class="alert alert-secondary" role="alert">
                <h2 data-toggle="collapse" href="#collapseExample2">Муниципальные кластеры</h2>
            </div>
            <table class="table table-stripe collapse" id="collapseExample2">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Базовая школа</th>
                    <th>Район</th>
                    <th>Школы реципиенты</th>
                    <th>Заявки</th>

                    {{-- <th>Решение</th> --}}

                </tr>
                </thead>
                @foreach($clusters as $cluster)
                    <tr>
                        <td>{{$cluster->id}}</td>
                        <td>
                            {{$cluster->user->fullname}}
                            @if ($cluster->agreement)
                                <p><a href="/files/agreements/{{ $cluster->agreement }}">Соглашение</a></p>
                            @endif
                        </td>
                        <td>{{$cluster->district->fullname}}</td>
                        <td>
                            @foreach(json_decode($cluster->schools, true) as $school)
                                {{ $school['school_name'] }}
                                @if (isset($school['file_name']))
                                    <a href="/files/contracts/{{ $school['file_name'] }}">Договор</a>
                                @endif
                                <br>
                            @endforeach
                        </td>
                        <td>
                            @forelse( $cluster->getBids() as $bid )
                                {{$bid->user->fullname}} {{ $bid->subject }} {{ $bid->getClasses() }}
                                класс {{ $bid->modul }} {{ $bid->form_of_education }} {{ $bid->form_education_implementation }}
                                <a href="/files/programs/{{ $bid->program->filename }}">Программа</a>
                                @if ($bid->program->schedule)
                                    <a href="/files/schedules/{{ $bid->program->schedule->filename }}">Расписание</a>
                                @endif
                                <br>
                            @empty
                                Заявок нет
                            @endforelse
                        </td>

                        {{-- <td>
                            @if ($cluster->status === 2)
                            <svg width="2em" height="2em" viewBox="0 0 16 16"
                            class="bi bi-check-circle-fill text-success" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                            @else
                            <a href="/clusters/add/{{ $cluster->id }}" class="btn btn-outline-success btn-sm">Одобрить</a>
                            <form action="{{ route('clusters.destroy',$cluster->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Удалить кластер</button>
                            </form>
                            @endif
                        </td> --}}

                    </tr>
                @endforeach
            </table>
            <br>


            <div class="alert alert-secondary" role="alert">
                <h2 data-toggle="collapse" href="#collapseExample3">Заявки в рассмотрении</h2>
            </div>
            <table class="table table-stripe collapse" id="collapseExample3">
                <thead>
                <tr>
                    <td>Организация</td>
                    <td>Класс</td>
                    <td>Предмет/курс</td>
                    <td>Раздел/модуль</td>
                    <td>Форма обучения</td>
                    <td>Условия реализации обучения</td>
                    <td>Комментарий</td>
                </tr>
                </thead>
                @foreach($bids as $bid)
                    <tr>
                        <td>{{ $bid->user->fullname }}</td>
                        <td>{{ $bid->getClasses() }}</td>
                        <td>{{ $bid->subject }}</td>
                        <td>{{ $bid->modul }}</td>
                        <td>{{ $bid->form_of_education }}</td>
                        <td>{{ $bid->form_education_implementation }}</td>
                        <td>{{ $bid->content }}</td>
                    </tr>
                @endforeach
            </table>


            {{-- <div class="alert alert-secondary" role="alert">
                <h2 data-toggle="collapse" href="#collapseExample4">Заявки на базовую школу</h2>
            </div>
            <div class="collapse" id="collapseExample4">
                @foreach($request_base_schools as $school)
                    <h5>{{ $school->fullname }}
                        <small>{{ $school->getDistrict->fullname }}</small>
                    </h5>
                        <a href="/user/approve/{{ $school->id }}" class="btn btn-outline-success btn-sm">Сделать базовой</a>
                        <a href="/user/reject/{{ $school->id }}" class="btn btn-outline-danger btn-sm">Удалить</a>

                @endforeach
            </div> --}}


        </div>
    </div>
@endsection
