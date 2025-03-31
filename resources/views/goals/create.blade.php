@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Goal</h1>

        <form action="{{ route('goals.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="target_amount">Target Amount:</label>
                <input type="number" step="0.01" class="form-control" id="target_amount" name="target_amount" required>
            </div>

            <div class="form-group">
                <label for="target_date">Target Date:</label>
                <input type="date" class="form-control" id="target_date" name="target_date" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
