<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = $this->api_get();

        return view('index', [
            'products' => $products,
        ]);
    }

    public function new() {
        return view('new');
    }

    public function create(ProductRequest $request) {
        $this->api_post($request);
        return redirect()->route('index');
    }

    public function ajax_active(Request $request) {
        Product::where('id', $request->id)->update(['active' => $request->active]);
        return response()->json();
    }


    public function api_get() {
        return Product::all();
    }

    public function api_post(Request $request) {
        Product::create($request->all());
    }

    public function api_put(Request $request, $id) {
        Product::where('id', $id)->update($request->all());
    }

    public function api_delete(Request $request, $id) {
        Product::where('id', $id)->delete();
    }
}
