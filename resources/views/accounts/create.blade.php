@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Account</h1>

        <form action="{{ route('accounts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="checking">Checking</option>
                    <option value="savings">Savings</option>
                    <option value="cash">Cash</option>
                </select>
            </div>

            <div class="form-group">
                <label for="balance">Balance:</label>
                <input type="number" step="0.01" class="form-control" id="balance" name="balance" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
