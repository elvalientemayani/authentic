@extends('layouts')  

@section('content')
    <div class="container">
        <h1>Item Details</h1>
        
        <div class="card">
            <div class="card-header">{{ $item->name }}</div>
            <div class="card-body">
                <p><strong>Description:</strong> {{ $item->description }}</p>
                <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
                
            </div>
        </div>
        
        <a href="{{ route('inventory') }}" class="btn btn-secondary">Back to Inventory</a>
    </div>
@endsection
