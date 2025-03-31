@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Credit Card</h1>

        <form action="{{ route('credit_cards.update', $creditCard->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $creditCard->name }}" required>
            </div>

            <div class="form-group">
                <label for="number">Number:</label>
                <input type="text" class="form-control" id="number" name="number" value="{{ $creditCard->number }}" required>
            </div>

            <div class="form-group">
                <label for="expiration_date">Expiration Date:</label>
                <input type="date" class="form-control" id="expiration_date" name="expiration_date" value="{{ $creditCard->expiration_date }}" required>
            </div>

            <div class="form-group">
                <label for="cvv">CVV:</label>
                <input type="text" class="form-control" id="cvv" name="cvv" value="{{ $creditCard->cvv }}" required>
            </div>

            <div class="form-group">
                <label for="credit_limit">Credit Limit:</label>
                <input type="number" step="0.01" class="form-control" id="credit_limit" name="credit_limit" value="{{ $creditCard->credit_limit }}" required>
            </div>

            <div class="form-group">
                <label for="available_credit">Available Credit:</label>
                <input type="number" step="0.01" class="form-control" id="available_credit" name="available_credit" value="{{ $creditCard->available_credit }}" required>
            </div>

            <div class="form-group">
                <label for="interest_rate">Interest Rate:</label>
                <input type="number" step="0.01" class="form-control" id="interest_rate" name="interest_rate" value="{{ $creditCard->interest_rate }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
