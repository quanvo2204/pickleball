@extends('front-end.layouts.app')
@section('title', 'Login')
@section('contents')


<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home')}}">Home</a></li>
                    <li class="breadcrumb-item">Forgot Password</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-10">
        <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success')}}
                </div>

            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error')}}
                </div>

            @endif
            <div class="login-form">
                <form action="{{ route('front.processForgotPassword')}}" method="post" name="formForgotPassword" id="formForgotPassword">
                    @csrf
                    <h4 class="modal-title">Login to Your Account</h4>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email')}}" required="required">
                        @error('email')
                            <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-outline-success" value="Submit">
                </form>
                <div class="text-center small"> <a class="text-primary" href="{{ route('account.login')}}">Login</a></div>
            </div>
        </div>
    </section>
</main>
@endsection

