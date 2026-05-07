<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/product', function () {
        // $products =Product::all();
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', compact('products'));
    })->name('product.list');

    Route::get('/product/create', function () {
        return  view('products.create');
    })->name('product.name');

    Route::post('/product', function (Request $request) {
        // return $request->all();
        $newProduct = new Product;
        $newProduct->description = $request->input('description');
        $newProduct->price = $request->input('price');
        $newProduct->save();
        // return response()->json([
        //     'message' => 'Producto guardado correctamente',
        //     'data' => $newProduct
        // ]);
        return redirect()->route('product.list')->with('info', 'Product successfully created');
    })->name('product.store');

    Route::delete('/product/{id}', function ($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()
            ->route('product.list')
            ->with('info', 'Product deleted successfully');
    })->name('product.destroy');

    Route::get('/product/{id}/edit', function ($id) {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    })->name('product.edit');

    Route::put('/product/{id}', function (Request $request, $id) {
        //    return $request->all(); 
        $product = Product::findOrFail($id);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return redirect()
            ->route('product.list')
            ->with('info', 'Product updated successfully');
    })->name('product.update');
});

require __DIR__.'/auth.php';
