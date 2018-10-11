@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Panel Principal</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <img src="{{asset('img/zelda.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>
</div>
@endsection
