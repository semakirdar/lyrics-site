@extends('layout')
@section('content')

    <div class="login">
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-user-plus"></i> Register</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('register.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label>Name</label>
                                <input name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>E-mail</label>
                                <input name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <button class="btn btn-success form-control">SAVE</button>
                        </form>
                        <a class="nav-link text-center text-white text-decoration-underline mt-3"
                           href="{{ route('login') }}">
                            <small>Have you already account? You can click here to login.</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
