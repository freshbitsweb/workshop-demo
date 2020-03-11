@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            @include('includes.errors')
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register</h1>
                            </div>

                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-user"
                                        name="name"
                                        required
                                        placeholder="Name"
                                    >
                                </div>

                                <div class="form-group">
                                    <input type="email"
                                        class="form-control form-control-user"
                                        name="email"
                                        required
                                        placeholder="Email Address"
                                    >
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password"
                                            class="form-control form-control-user"
                                            name="password"
                                            required
                                            placeholder="Password"
                                        >
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="password"
                                            class="form-control form-control-user"
                                            name="password_confirmation"
                                            required
                                            placeholder="Repeat Password"
                                        >
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Register') }}
                                </button>
                            </form>

                            <hr>

                            <div class="text-center">
                                <a class="small" href="{{ route('home') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection
