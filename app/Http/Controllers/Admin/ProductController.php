<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Http\Requests\Products\StoreProductRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    protected $productService;

    /**
     * @param ProductService $productService
     */
    public function __construct(
        ProductService $productService
    ){
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->index();
        $categories = Category::where('active', ENABLE)->get();

        return view('admins.products.index', compact('products','categories'));
    }

    public function create(StoreProductRequest $request)
    {
        $response = $this->productService->create($request->all());
        if ($response['status']) {
            return redirect()->back()->with('success', 'Create product successfully!');
        }

        return redirect()->back()->with('error', 'Create product error!');
    }

    public function detail($id)
    {
        $product = $this->productService->detail($id);
        if (!$product['status']) {
            return view('admins.404');
        }
        $categories = Category::where('active', ENABLE)->get();
        $product = $product['data'];

        return view('admins.products.update', compact('product', 'categories'));
    }

    public function update(StoreProductRequest $request, $id)
    {
        $response = $this->productService->update($request->all(), $id);
        if ($response['status']) {
            return redirect()->back()->with('success', 'Update product successfully!');
        }

        return redirect()->back()->with('error', 'Update product error!');
    }

    public function delete($id)
    {
        $response = $this->productService->delete($id);
        if ($response['status']) {
            return redirect()->back()->with('success', 'delete product successfully!');
        }

        return redirect()->back()->with('error', 'delete product error!');
    }
}
