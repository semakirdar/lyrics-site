@extends('layout')
@section('content')

    <div class="login">
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="card">
                    <h3>LOGIN</h3>
                    <form method="post" action="{{ route('login.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label>E-mail</label>
                            <input name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button class="btn btn-success form-control">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection()
