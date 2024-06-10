<!-- resources/views/items/edit.blade.php -->

@extends('guru.layout')

@section('content')
<div class="container">
    <h1>Edit Item</h1>
    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" name="id" class="form-control" value="{{ $item->id }}" required>
        </div>
        <div class="form-group">
            <label for="desc">Description:</label>
            <input type="text" name="desc" class="form-control" value="{{ $item->desc }}" required>
        </div>
        <div class="form-group">
            <label for="hasta">Hasta:</label>
            <input type="date" name="hasta" class="form-control" value="{{ $item->hasta }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection