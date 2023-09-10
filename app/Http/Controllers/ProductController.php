<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(){
        return view('product.addProduct');
    }
    public function addPushProduct(Request $request){
        $request->validate([
            'productName' => 'required',
            'productDescription' => 'required',
            'productSN' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required'
        ]);
        $product = new Product();
        $product->productName = $request->productName;
        $product->productDescription = $request-> productDescription;
        $product->productSN = $request -> productSN;
        $product->productPrice = $request -> productPrice;
        $product->productQuantity = $request -> productQuantity;
        $res = $product-> save();
        if($res){
            return back()-> with('success', 'You Have Added A Product Successfully');
        }
        else {
            return back() -> with('failed', 'Failed To Add A Product!');
        }
    }

    public function removeProduct($id){
        $product = Product::find($id);

        if(!$product){
            return back()->with('failed', 'Product not found!');
        }

        $res = $product->delete();
        if($res){
            return back()->with('success', 'Product deleted successfuly');
        }
        else{
            return back()->with('failed', ' Failed to delete product');
        }
    }

    public function editProduct($id){
        $product = Product::find($id);
    
    if(!$product){
        return back()->with('failed', 'Product not found!');
    }
    return view('product.editProduct', compact('product'));
    }

    public function editPushProduct(Request $request, $id){
        $request->validate([
            'productName' => 'required',
            'productDescription' => 'required',
            'productSN' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required'
        ]);

        $product = Product::find($id);

        if(!$product){
            return back()->with('failed', 'Product not found!');
        }

        $product->productName = $request->productName;
        $product->productDescription = $request->productDescription;
        $product->productSN = $request->productSN;
        $product->productPrice = $request -> productPrice;
        $product->productQuantity = $request->productQuantity;
        $res = $product->save();

        if($res){
            return redirect()->route('product.edit', $id)-> with('success', 'Product Edited Successfully');
        }
        else{
            return back()->with('failed' , 'Failed to Edit Product');
        }
    }

    public function webcam(){
        return view('web');
    }

    public function searchProduct(Request $request)
{
    // Check if the "Search" button is pressed
    if ($request->has('searchButton')) {
    
        $searchTerm = $request->input('searchTerm');

        $products = DB::table('products')
            ->select('productName', 'productDescription','productSN','productPrice','productQuantity', 'created_at', 'updated_at')
            ->where(function($query) use ($searchTerm) {
                $query->where('productName', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('productDescription', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('productSN', 'LIKE', '%' . $searchTerm . '%');
                      
            })
            ->get();
    } else {
        // Load all products when the page is initially loaded
        $products = DB::table('products')
            ->select('productName', 'productDescription', 'productSN', 'productPrice' , 'productQuantity', 'created_at', 'updated_at')
            ->get();
    }

    return view('search', compact('products'));
    return view('product.selectOutProduct', compact('products'));
}

public function outProduct(Request $request)
{
    // Retrieve the selected product IDs from the form
    $productIds = $request->input('product_ids');

    // Initialize an empty array for selected products
    $selectedProducts = [];

    // Check if there are selected product IDs
    if (!empty($productIds)) {
        // Find the products by their IDs
        $selectedProducts = Product::whereIn('id', $productIds)->get();
    }

    return view('product.outProduct', compact('selectedProducts'));
}

    public function selectOutProduct(){

        $products = Product::all();
        return view('product.selectOutProduct', compact('products'));
    }
}
