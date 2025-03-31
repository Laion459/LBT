@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Goals</h1>

        <a href="{{ route('goals.create') }}" class="btn btn-primary">Create New Goal</a>

        @if(count($goals) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Target Amount</th>
                        <th>Current Amount</th>
                        <th>Target Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($goals as $goal)
                        <tr>
                            <td>{{ $goal->name }}</td>
                            <td>{{ $goal->target_amount }}</td>
                            <td>{{ $goal->current_amount }}</td>
                            <td>{{ $goal->target_date }}</td>
                            <td>
                                <a href="{{ route('goals.show', $goal->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('goals.edit', $goal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('goals.destroy', $goal->id) }}" method="POST" style="display: inline;">
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
            <p>No goals found.</p>
        @endif
    </div>
@endsection
