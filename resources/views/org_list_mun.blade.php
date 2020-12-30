@extends('layouts.app')

@section('content')
@if (Auth::user() && Auth::user()->status == 10)
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <p><a href="{{ route('home')}}"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться на главную страницу
            </a></p>

            <ul class="list-group">

                <li class="list-group-item">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              Организация
                          </span>
                        </div>
                        <input type="text" class="form-control"
                        id="org" onkeyup="org()">
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              ИНН
                          </span>
                        </div>
                        <input type="text" class="form-control"
                        id="inn" onkeyup="inn()">
                    </div>
                </li>

            </ul>

            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">id <i class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col">Организация <i class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col">ИНН <i class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col">Кол-во заявок <i class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col">Кол-во одобренных программ <i class="fas fa-arrows-alt-v"></i></th>
                        <th scope="col">Информация</th>
                    </tr>
                </thead>
                <tbody id="table1">
                    @foreach($users as $user_org)
                    @if(($user_org->district == Auth::user()->getDistrict->id))
                    <tr>
                        <td scope="row">{{ $user_org->id }}</td>
                        <td>{{ $user_org->fullname }}</td>
                        <td>{{ $user_org->inn }}</td>
                        <td>{{ $user_org->amount_of_bids() }}</td>
                        <td>{{ $user_org->amount_of_programs_1() }}</td>
                        <td>
                            <a class="btn btn-outline-dark" href="/users/{{ $user_org->id }}/show-org">Информация</a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                  </tr>

                </tbody>
            </table>

            <p><a href="{{ route('home')}}"
                class="btn btn-outline-info btn">
                <i class="fas fa-arrow-left"></i> Вернуться на главную страницу
            </a></p>
        </div>
    </div>
</div>


<script src="{{ asset('js/poisk_organizations_list_reg.js') }}"></script>
<script src="{{ asset('js/sort_org_list_reg.js') }}"></script>
@endif
@endsection
