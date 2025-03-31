@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Transactions</h1>

        <a href="{{ route('transactions.create') }}" class="btn btn-primary">Create New Transaction</a>

        @if(count($transactions) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->date }}</td>
                            <td>{{ $transaction->description }}</td>
                            <td>{{ $transaction->amount }}</td>
                            <td>{{ $transaction->type }}</td>
                            <td>
                                <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No transactions found.</p>
        @endif
    </div>
@endsection
