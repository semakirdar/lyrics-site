@extends('layout')
@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card new-create">
                    <div class="card-body">
                        <div class="new-create">
                            <form method="post" action="{{route('playlist.store')}}">
                                @csrf
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input class="form-control" name="name">
                                </div>
                                <button class="btn btn-info">CREATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
