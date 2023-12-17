@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">My Profile</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" value="{{ auth()->user()->name }}" class="form-control" readonly>
                                <small><a href="#" id="editName">Edit</a></small>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" class="form-control" readonly>
                                <small><a href="#" id="editEmail">Edit</a></small>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="tel" name="phone" id="phone" value="{{ auth()->user()->phone }}" class="form-control" readonly>
                                <small><a href="#" id="editPhone">Edit</a></small>
                            </div>

                            <button type="submit" class="btn btn-primary" style="display: none;" id="updateBtn">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Enable editing for each field
            document.getElementById('editName').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('name').readOnly = false;
                document.getElementById('updateBtn').style.display = 'block';
            });

            document.getElementById('editEmail').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('email').readOnly = false;
                document.getElementById('updateBtn').style.display = 'block';
            });

            document.getElementById('editPhone').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('phone').readOnly = false;
                document.getElementById('updateBtn').style.display = 'block';
            });
        });
    </script>
@endsection
