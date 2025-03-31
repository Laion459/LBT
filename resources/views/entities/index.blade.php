@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-5">Entities Management</h1>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">Entities</h3>
            <a href="{{ route('entities.create') }}" class="btn btn-primary shadow-sm d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg me-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5V7.5H14a.5.5 0 0 1 0 1H8.5V14a.5.5 0 0 1-1 0V8.5H2a.5.5 0 0 1 0-1h5.5V1.5A.5.5 0 0 1 8 1z"/>
                </svg>
                Add New Entity
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(count($entities) > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover shadow-sm">
                    <thead class="table-light text-center">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($entities as $entity)
                            <tr>
                                <td class="align-middle">{{ $entity->name }}</td>
                                <td class="align-middle text-center">{{ ucfirst($entity->type) }}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('entities.show', $entity->id) }}" class="btn btn-sm btn-outline-info me-1" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('entities.edit', $entity->id) }}" class="btn btn-sm btn-outline-warning me-1" title="Edit Entity">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('entities.destroy', $entity->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this entity?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Entity">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                <i class="bi bi-info-circle me-2"></i> No entities found.  Click "Add New Entity" to get started.
            </div>
        @endif
    </div>
@endsection
