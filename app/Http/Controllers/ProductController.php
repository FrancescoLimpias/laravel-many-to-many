<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.home', compact("products"));
    }

    /**
     * Display a listing by Category of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexByCategory()
    {
        $categories = Category::all();
        return view('home', compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $types = Type::all();

        return view('product.create', compact("categories", "types"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validation
        $data = $request -> validate([
            'name' => 'required|string|max:20',
            'description' => 'required|string|max:255',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'typology_id' => 'required|integer',
            'categories' => 'required|array'
        ]);

        // Creating code
        $data['code'] = fake()->regexify('[A-Z0-9]{5}');

        // Associating type
        $product = Product::make($data);
        $type = Type::find($data['type_id']);
        $product->type()->associate($type);

        // Saving product
        $product->save();

        // Associating categories
        $categories = Category::find($data["categories"]);
        $product->categories()->attach($categories);
        
        return redirect()->route("product.home");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
