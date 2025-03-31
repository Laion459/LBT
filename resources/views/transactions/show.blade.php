@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Transaction Details</h1>

        <p><strong>Date:</strong> {{ $transaction->date }}</p>
        <p><strong>Description:</strong> {{ $transaction->description }}</p>
        <p><strong>Amount:</strong> {{ $transaction->amount }}</p>
        <p><strong>Type:</strong> {{ $transaction->type }}</p>

        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
