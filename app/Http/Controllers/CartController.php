<?php

namespace App\Http\Controllers;

use App\Cart\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    /**
     * @var CartService
     */
    protected $cartService;

    /**
     * 
     */
    public function __construct(
        CartService $cartService
    ){
        $this->cartService = $cartService;
    }

    public function addCart(Request $request, $id)
    {
        $cartProducts = $this->cartService->addCart($request, $id);

        return view('cart', compact('cartProducts'));
    }

    public function checkout(Request $request)
    {
        $response = $this->cartService->checkout($request);
        if ($response['status']) {
            return redirect()->back()->with('success', 'Purchased product successfully!');
        }

        return redirect()->back()->with('error', 'Purchased product error!');
    }
}
