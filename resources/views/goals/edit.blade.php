@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Goal</h1>

        <form action="{{ route('goals.update', $goal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $goal->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{ $goal->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="target_amount">Target Amount:</label>
                <input type="number" step="0.01" class="form-control" id="target_amount" name="target_amount" value="{{ $goal->target_amount }}" required>
            </div>

            <div class="form-group">
                <label for="current_amount">Current Amount:</label>
                <input type="number" step="0.01" class="form-control" id="current_amount" name="current_amount" value="{{ $goal->current_amount }}" required>
            </div>

            <div class="form-group">
                <label for="target_date">Target Date:</label>
                <input type="date" class="form-control" id="target_date" name="target_date" value="{{ $goal->target_date }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
