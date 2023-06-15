@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                User Details
            </div>
            <div class="card-body">
                <p class="card-title">Name: {{ $user->name }}</p>
                <p class="card-text">Email: {{ $user->email }}</p>
                <p class="card-text">Role: {{ $user->role }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('user.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
