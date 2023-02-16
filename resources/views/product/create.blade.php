@extends('layouts.main')

@section('main')
    <h2>
        product.create
    </h2>

    <form action="{{ route('product.store') }}" method="post">
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>

        <label for="description">Description</label>
        <input type="text" name="description" id="description">
        <br>

        <label for="price">Price</label>
        <input type="number" name="price" id="price">
        <br>

        <label for="weight">Weight</label>
        <input type="number" name="weight" id="weight">
        <br>

        <label for="type_id">Type</label>
        <select name="type_id" id="type_id">
            @foreach ($types as $type)
                <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
            @endforeach
        </select>
        <br>

        <h3>Categories</h3>
        @foreach ($categories as $category)
            <input type="checkbox" name="categories[]" value="{{ $category->id }}">
            <label for="categories">{{ $category->name }}</label>
            <br>
        @endforeach
        <br>

        <input type="submit" value="Create product">
    </form>
@endsection
