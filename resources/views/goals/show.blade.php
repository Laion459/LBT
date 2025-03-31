@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Goal Details</h1>

        <p><strong>Name:</strong> {{ $goal->name }}</p>
        <p><strong>Description:</strong> {{ $goal->description }}</p>
        <p><strong>Target Amount:</strong> {{ $goal->target_amount }}</p>
        <p><strong>Current Amount:</strong> {{ $goal->current_amount }}</p>
        <p><strong>Target Date:</strong> {{ $goal->target_date }}</p>

        <a href="{{ route('goals.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
