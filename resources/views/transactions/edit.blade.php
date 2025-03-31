@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Transaction</h1>

        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="entity_id">Entity:</label>
                <select class="form-control" id="entity_id" name="entity_id" required>
                    @foreach($entities as $entity)
                        <option value="{{ $entity->id }}" {{ $transaction->entity_id == $entity->id ? 'selected' : '' }}>{{ $entity->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $transaction->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="account_id">Account:</label>
                <select class="form-control" id="account_id" name="account_id">
                    <option value="">-- Select Account --</option>
                    @foreach($accounts as $account)
                        <option value="{{ $account->id }}" {{ $transaction->account_id == $account->id ? 'selected' : '' }}>{{ $account->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="credit_card_id">Credit Card:</label>
                <select class="form-control" id="credit_card_id" name="credit_card_id">
                    <option value="">-- Select Credit Card --</option>
                    @foreach($creditCards as $creditCard)
                        <option value="{{ $creditCard->id }}"  {{ $transaction->credit_card_id == $creditCard->id ? 'selected' : '' }}>{{ $creditCard->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $transaction->date }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{ $transaction->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ $transaction->amount }}" required>
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Income</option>
                    <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Expense</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
