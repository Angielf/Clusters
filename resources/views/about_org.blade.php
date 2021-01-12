@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <table class="table table-striped table-bordered">
                <tbody>
                  <tr>
                    <th scope="row">Район</th>
                    <td>{{ $org->getDistrict->fullname }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Организация</th>
                    <td>{{ $org->fullname }}</td>
                  </tr>
                  <tr>
                    <th scope="row">ИНН</th>
                    <td>{{ $org->inn }}</td>
                  </tr>

                  <tr>
                    <th scope="row">Адрес</th>
                    <td>{{ $org->address }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Телефон</th>
                    <td>{{ $org->tel }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Почта</th>
                    <td><a href="mailto:{{ $org->email_real }}">{{ $org->email_real }}</a></td>
                  </tr>
                  <tr>
                    <th scope="row">Сайт</th>
                    <td><a href="http://{{ $org->website }}" target="_blank">{{ $org->website }}</a></td>
                  </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
