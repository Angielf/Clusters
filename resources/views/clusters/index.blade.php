@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2>Региональные кластеры</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Базовая школа</th>
                    <th>Школы реципиенты</th>
                </tr>
                </thead>
                @foreach($region_clusters as $cluster)
                    <tr>
                        <td>{{$cluster->id}}</td>
                        <td>{{$cluster->getClusterName()}}</td>
                        <td>{{$cluster->user->fullname}}</td>
                    </tr>
                @endforeach
            </table>
            <h2>Муниципальные кластеры</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Базовая школа</th>
                    <th>Район</th>
                    <th>Школы реципиенты</th>
                    <th>Решение</th>
                </tr>
                </thead>
                @foreach($clusters as $cluster)
                    <tr>
                        <td>{{$cluster->id}}</td>
                        <td>{{$cluster->user->fullname}}</td>
                        <td>{{$cluster->district->fullname}}</td>
                        <td>
                            @foreach(json_decode($cluster->schools, true) as $school)
                                {{ $school['school_name'] }}
                                <br>
                            @endforeach
                        </td>
                        <td>
                            @if ($cluster->status === 1)
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
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Удалить</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
