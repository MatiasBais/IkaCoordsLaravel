<!-- resources/views/items/index.blade.php -->

@extends('guru.layout')

@section('content')
<div class="container">
    <h1>Items</h1>
    <a href="{{ route('items.create') }}" class="btn btn-primary">Add Item</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Hasta</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->desc }}</td>
                    <td>{{ $item->hasta }}</td>
                    <td>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection