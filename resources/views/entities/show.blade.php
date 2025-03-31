@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Entity Details</h1>

        <p><strong>Name:</strong> {{ $entity->name }}</p>
        <p><strong>Description:</strong> {{ $entity->description }}</p>
        <p><strong>Type:</strong> {{ $entity->type }}</p>

        <a href="{{ route('entities.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
