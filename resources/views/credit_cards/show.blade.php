@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Credit Card Details</h1>

        <p><strong>Name:</strong> {{ $creditCard->name }}</p>
        <p><strong>Number:</strong> {{ $creditCard->number }}</p>
        <p><strong>Expiration Date:</strong> {{ $creditCard->expiration_date }}</p>
        <p><strong>Credit Limit:</strong> {{ $creditCard->credit_limit }}</p>
        <p><strong>Available Credit:</strong> {{ $creditCard->available_credit }}</p>
        <p><strong>Interest Rate:</strong> {{ $creditCard->interest_rate }}</p>

        <a href="{{ route('credit_cards.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
