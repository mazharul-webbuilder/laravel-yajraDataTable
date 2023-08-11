@extends('master')
@section('title')
    Register
@endsection
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header bg-danger">
                            <h3 class="text-center text-light">Register User</h3>
                        </div>
                        <div class="card-body bg bg-secondary text-light">
                            <form action="{{route('register.post')}}" method="post">
                                @if(Session::has('message'))
                                    <p class="text-center text-danger">{{Session::get('message')}}</p>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @csrf
                                <input type="text" placeholder="Enter Name" name="name" class="form-control">
                                <div class="mt-3"></div>
                                <input type="email" placeholder="Enter Email" name="email" class="form-control">
                                <div class="mt-3"></div>
                                <input type="password" placeholder="Enter Password" name="password" class="form-control">
                                <div class="mt-3"></div>
                                <div class="d-flex justify-content-between">
                                    <input type="submit" class="btn btn-md btn-light" value="Register">
                                    <div class="d-flex">
                                        <p class="px-2 mb-0 mt-2">Already Registered?</p>
                                        <a href="{{ route('login') }}" class="btn btn-info">Login</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
