@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Category Details</h1>

        <p><strong>Name:</strong> {{ $category->name }}</p>
        <p><strong>Description:</strong> {{ $category->description }}</p>
        <p><strong>Type:</strong> {{ $category->type }}</p>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
