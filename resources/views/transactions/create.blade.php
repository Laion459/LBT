@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Transaction</h1>

        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="entity_id">Entity:</label>
                <select class="form-control" id="entity_id" name="entity_id" required>
                    @foreach($entities as $entity)
                        <option value="{{ $entity->id }}">{{ $entity->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="account_id">Account:</label>
                <select class="form-control" id="account_id" name="account_id">
                    <option value="">-- Select Account --</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="credit_card_id">Credit Card:</label>
                <select class="form-control" id="credit_card_id" name="credit_card_id">
                    <option value="">-- Select Credit Card --</option>
                    @foreach($creditCards as $creditCard)
                        <option value="{{ $creditCard->id }}">{{ $creditCard->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
