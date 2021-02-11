<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Муниципалитет</th>
        <th scope="col">Базовая организация</th>
        <th scope="col">ИНН базовой организации</th>

        <th scope="col">Предполагаемое кол-во часов за 2021-01</th>
        <th scope="col">Реальное подтверждённое кол-во часов за 2021-01</th>
        <th scope="col">Предполагаемое кол-во часов за 2021-02</th>
        <th scope="col">Реальное подтверждённое кол-во часов за 2021-02</th>
        <th scope="col">Предполагаемое кол-во часов за 2021-03</th>
        <th scope="col">Реальное подтверждённое кол-во часов за 2021-03</th>
        <th scope="col">Предполагаемое кол-во часов за 2021-04</th>
        <th scope="col">Реальное подтверждённое кол-во часов за 2021-04</th>
        <th scope="col">Предполагаемое кол-во часов за 2021-05</th>
        <th scope="col">Реальное подтверждённое кол-во часов за 2021-05</th>
        {{-- <th scope="col">Предполагаемое кол-во часов</th>
        <th scope="col">Реальное кол-во часов</th> --}}

      </tr>
    </thead>
    <tbody>
        @foreach($users as $user_org)
        @if($user_org->amount_of_selected_months_hours() > 0)
        <tr>
            <td>{{$user_org->getDistrict->fullname }}</td>
            <td>{{ $user_org->fullname}}</td>
            <td>{{ $user_org->inn }}</td>


            <td>
                @if($user_org->amount_selected_estimated_per_1() > 0)
                    {{$user_org->amount_selected_estimated_per_1() }}
                @endif
            </td>
            <td>
                @if($user_org->amount_selected_real_per_1() > 0)
                    {{$user_org->amount_selected_real_per_1() }}
                @endif
            </td>
            <td>
                @if($user_org->amount_selected_estimated_per_2() > 0)
                    {{$user_org->amount_selected_estimated_per_2() }}
                @endif
            </td>
            <td>
                @if($user_org->amount_selected_real_per_2() > 0)
                    {{$user_org->amount_selected_real_per_2() }}
                @endif
            </td>
            <td>
                @if($user_org->amount_selected_estimated_per_3() > 0)
                    {{$user_org->amount_selected_estimated_per_3() }}
                @endif
            </td>
            <td>
                @if($user_org->amount_selected_real_per_3() > 0)
                    {{$user_org->amount_selected_real_per_3() }}
                @endif
            </td>
            <td>
                @if($user_org->amount_selected_estimated_per_4() > 0)
                    {{$user_org->amount_selected_estimated_per_4() }}
                @endif
            </td>
            <td>
                @if($user_org->amount_selected_real_per_4() > 0)
                    {{$user_org->amount_selected_real_per_4() }}
                @endif
            </td>
            <td>
                @if($user_org->amount_selected_estimated_per_5() > 0)
                    {{$user_org->amount_selected_estimated_per_5() }}
                @endif
            </td>
            <td>
                @if($user_org->amount_selected_real_per_5() > 0)
                    {{$user_org->amount_selected_real_per_5() }}
                @endif
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

