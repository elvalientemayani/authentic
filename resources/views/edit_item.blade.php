@extends('layouts')

@section('content')
    <div class="container">
        <h1>Edit Item</h1>
        
        <form action="{{ route('item.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $item->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $item->quantity }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Item</button>
        </form>
    </div>
@endsection
