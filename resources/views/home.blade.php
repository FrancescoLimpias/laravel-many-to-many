@extends('layouts.main')

@section('main')
    <h2>
        home
    </h2>

    <ul>
        <li>
            @include('components.createProductButton')
        </li>
        @foreach ($categories as $category)
            <li class="category-{{ $category['code'] }}">
                <p>
                <h3>
                    {{ $category['name'] }}
                </h3>

                <ul>
                    @foreach ($category->products as $product)
                        <li class="product-{{ $product['code'] }}">
                            {{ $product['name'] }}
                            {{ $product->type->digital ? "(digital)" : ""}}
                        </li>
                    @endforeach
                </ul>
                </p>
            </li>
        @endforeach
    </ul>
@endsection
