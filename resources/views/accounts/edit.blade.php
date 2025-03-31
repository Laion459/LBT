@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Account</h1>

        <form action="{{ route('accounts.update', $account->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $account->name }}" required>
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="checking" {{ $account->type == 'checking' ? 'selected' : '' }}>Checking</option>
                    <option value="savings" {{ $account->type == 'savings' ? 'selected' : '' }}>Savings</option>
                    <option value="cash" {{ $account->type == 'cash' ? 'selected' : '' }}>Cash</option>
                </select>
            </div>

            <div class="form-group">
                <label for="balance">Balance:</label>
                <input type="number" step="0.01" class="form-control" id="balance" name="balance" value="{{ $account->balance }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{ $account->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
