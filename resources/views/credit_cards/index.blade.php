@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Credit Cards</h1>

        <a href="{{ route('credit_cards.create') }}" class="btn btn-primary">Create New Credit Card</a>

        @if(count($creditCards) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Credit Limit</th>
                        <th>Available Credit</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($creditCards as $creditCard)
                        <tr>
                            <td>{{ $creditCard->name }}</td>
                            <td>{{ $creditCard->credit_limit }}</td>
                            <td>{{ $creditCard->available_credit }}</td>
                            <td>
                                <a href="{{ route('credit_cards.show', $creditCard->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('credit_cards.edit', $creditCard->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('credit_cards.destroy', $creditCard->id) }}" method="POST" style="display: inline;">
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
            <p>No credit cards found.</p>
        @endif
    </div>
@endsection
