@extends('layout')
@section('content')

    <div class="container">
        <div class="new-create">
            <form method="post" action="">
                @csrf¬
                <div class="mb-3">
                    <label>Name</label>
                    <input class="form-control" name="name">
                </div>
                <button class="btn btn-info">CREATE</button>
            </form>
        </div>
    </div>

@endsection
