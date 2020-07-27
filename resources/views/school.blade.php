@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>{{$user->fullname}} <br>
                            <small>{{$user->getDistrict->fullname}}</small>
                        </h2>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Мои заявки</h5>
                        <p class="card-text"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam assumenda culpa cum cupiditate, delectus ea facere minima molestiae molestias nisi nostrum nulla omnis, porro quia quod sed, vitae voluptates.</span><br>
                            <span>Animi aperiam architecto dignissimos doloremque doloribus, earum eius enim ipsa neque nulla obcaecati placeat quam quasi, quidem quod repudiandae ullam ut veniam. Deserunt ipsum magni molestias nam obcaecati repudiandae, voluptatem.</span>   </p>
                        <a href="/bids/create" class="btn btn-primary">Подать заявление</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
