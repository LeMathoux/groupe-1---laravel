<!-- resources/views/items/edit.blade.php -->
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

    <h1>Edit Item</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $item->name) }}">
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description', $item->description) }}</textarea>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="{{ old('price', $item->price) }}">
        </div>
        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $item->quantity) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection