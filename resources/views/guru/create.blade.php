<!-- resources/views/items/create.blade.php -->

@extends('guru.layout')

@section('content')
<div class="container">
    <h1>Create Item</h1>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" name="id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="desc">Description:</label>
            <input type="text" name="desc" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="hasta">Hasta:</label>
            <input type="date" name="hasta" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection