@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card-body">
                        @if (auth()->check())
                            <form method="POST" action="{{ route('ndelok.update') }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Address:</label>
                                    <input type="text" id="alamat" name="alamat" value="{{ auth()->user()->alamat }}" class="form-control" disabled>
                                </div>

                                <a href="{{ route('ndelok.edit') }}" class="btn btn-primary">Edit Profile</a>
                            </form>
                        @else
                            <p>User not authenticated.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
