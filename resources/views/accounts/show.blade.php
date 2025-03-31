@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Account Details</h1>

        <p><strong>Name:</strong> {{ $account->name }}</p>
        <p><strong>Type:</strong> {{ $account->type }}</p>
        <p><strong>Balance:</strong> {{ $account->balance }}</p>
        <p><strong>Description:</strong> {{ $account->description }}</p>

        <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
