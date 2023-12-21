@extends('layouts.template2')

@section('content')

Hello Admin :                                   {{ Auth::user()->name }}


@endsection