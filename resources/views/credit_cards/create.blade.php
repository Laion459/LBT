@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Credit Card</h1>

        <form action="{{ route('credit_cards.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="number">Number:</label>
                <input type="text" class="form-control" id="number" name="number" required>
            </div>

            <div class="form-group">
                <label for="expiration_date">Expiration Date:</label>
                <input type="date" class="form-control" id="expiration_date" name="expiration_date" required>
            </div>

            <div class="form-group">
                <label for="cvv">CVV:</label>
                <input type="text" class="form-control" id="cvv" name="cvv" required>
            </div>

            <div class="form-group">
                <label for="credit_limit">Credit Limit:</label>
                <input type="number" step="0.01" class="form-control" id="credit_limit" name="credit_limit" required>
            </div>

            <div class="form-group">
                <label for="available_credit">Available Credit:</label>
                <input type="number" step="0.01" class="form-control" id="available_credit" name="available_credit" required>
            </div>

            <div class="form-group">
                <label for="interest_rate">Interest Rate:</label>
                <input type="number" step="0.01" class="form-control" id="interest_rate" name="interest_rate" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
