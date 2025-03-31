@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Entity</h1>

        <form action="{{ route('entities.update', $entity->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $entity->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{ $entity->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="business" {{ $entity->type == 'business' ? 'selected' : '' }}>Business</option>
                    <option value="personal" {{ $entity->type == 'personal' ? 'selected' : '' }}>Personal</option>
                    <option value="property" {{ $entity->type == 'property' ? 'selected' : '' }}>Property</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
