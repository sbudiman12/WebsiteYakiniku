@extends('layouts.navbar')

@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header cbbg seasalt">Edit Profile</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nama:</label>
                                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">No. Telp:</label>
                                <input type="tel" id="phone_number" name="phone_number" value="{{ auth()->user()->phone_number }}" class="form-control" required>
                            </div>

                            <div class="py-3">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger follybg seasalt">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </div>
                </div>


                <div class="card mt-4">
                    <div class="card-header cbbg seasalt">Sejarah Transaksi</div>
                    <div class="card-body">
                        @if (!is_null(auth()->user()->transaksis) && count(auth()->user()->transaksis) > 0)
                            <ul>
                                @foreach (auth()->user()->transaksis->sortByDesc('tanggal') as $transaction)
                                <li>
                                    <form action="{{ route('transaksi.detail') }}" method="POST" class="transaction-form">
                                        @csrf
                                        <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                        <button type="submit" class="btn btn-primary">
                                            <span class="transaction-info">
                                               ID Transaksi: {{ $transaction->id }}<br>

                                            </span>


                                        </button>
                                        <br>

                                        Status: <b>{{ $transaction->status->status_name }}</b><br>
                                        Tanggal: {{ $transaction->tanggal }}<br>
                                    </form>
                                </li>
                                <hr>
                                @endforeach
                            </ul>
                        @else
                            <p>Belum ada transaksi.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@if(session('toast'))
    <script>
        Toastify({
            text: "{{ session('toast.message') }}",
            duration: 3000,
            close: true,
            gravity: "bottom", // Adjust as needed
            position: "right", // Adjust as needed
            backgroundColor: "#28a745", // Green color, adjust as needed
        }).showToast();
    </script>
@endif
