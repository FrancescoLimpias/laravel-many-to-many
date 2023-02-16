@extends('layouts.main')

@section('main')
    <h2>
        product.home
    </h2>

    <ul>
        @foreach ($products as $product)
            <li>
                {{ $product["name"] }}
                {{ $product->type->digital ? "(digital)" : ""}}
            </li>
        @endforeach
    </ul>
@endsection
