<!-- resources/views/items/index.blade.php -->
@extends('layouts.app')

@section('title', 'Liste des items')

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

    <h1>Items</h1>
    <a href="{{ route('items.create') }}" class="btn btn-primary">Create Item</a>
    <ul>
        @foreach ($items as $item)
            <li>
                <a href="{{ route('items.show', $item->id) }}">{{ $item->name }}</a>
                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection