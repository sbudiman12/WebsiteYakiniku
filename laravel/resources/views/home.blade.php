@extends('layouts.navbar')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @if (Auth::user()->isMember())
                        <p>Just a Regular Member</p>

                    @endif

                    @if (Auth::user()->isAdmin())
                    <p>Just a Regular Admin</p>

                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
