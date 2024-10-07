<!-- resources/views/items/create.blade.php -->
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

    <h1>Create Item</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div>
            <label for="price">Prix :</label>
            <input type="text" id="price" name="price" required>
        </div>
        <div>
            <label for="quantity">Quantité :</label>
            <input type="number" id="quantity" name="quantity" required>
        </div>
        <button type="submit">Créer</button>
    </form>
@endsection