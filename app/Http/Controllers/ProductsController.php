<?php

namespace App\Http\Controllers;


use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{



    public function __construct(protected ProductService $productService)
    {
    }

    public function index()
    {
        return view('commerce.products.index');
    }

    public function create()
    {
        $collections = Collection::all(['id', 'name']);
        $categories = Category::all(['id', 'name']);
        return view('commerce.products.create', compact(['collections', 'categories']));
    }

    /**
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $response = $this->productService->store($request);
        return \response()->json($response);
    }

    public function show(Product $product)
    {
    }

    public function edit(Product $product)
    {
    }

    public function update(Request $request, Product $product)
    {
    }

    public function destroy(Product $product)
    {
    }


}
