@extends('layouts')

@section('content')
    <div class="container">
        <h1>Inventory</h1>
        
        <a href="{{ route('item.create') }}" class="btn btn-primary">Add Item</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            <a href="{{ route('item.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('item.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            <a href="{{ route('item.details', $item->id) }}" class="btn btn-info">View Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    </div>
@endsection
