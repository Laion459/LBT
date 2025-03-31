@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Accounts</h1>

        <a href="{{ route('accounts.create') }}" class="btn btn-primary">Create New Account</a>

        @if(count($accounts) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Balance</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accounts as $account)
                        <tr>
                            <td>{{ $account->name }}</td>
                            <td>{{ $account->type }}</td>
                            <td>{{ $account->balance }}</td>
                            <td>
                                <a href="{{ route('accounts.show', $account->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" style="display: inline;">
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
            <p>No accounts found.</p>
        @endif
    </div>
@endsection
