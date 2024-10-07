<!-- resources/views/items/show.blade.php -->
@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1>{{ $item->name }}</h1>
    <p>{{ $item->description }}</p>
    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('items.index') }}" class="btn btn-secondary">Back to List</a>
@endsection