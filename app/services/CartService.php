<?php

namespace App\Services;

use App\Models\Product;
use App\Cart\Cart;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Jobs\SendMailPurchasedProductJob;
use Illuminate\Support\Facades\Mail;

class CartService
{
    /**
     * 
     */
    public function __construct(){}

    public function addCart($request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $oldCart = $request->session()->has('Cart') ? $request->session()->get('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product);
            $request->session()->put('Cart', $newCart);
        }
        $cartProducts = $request->session()->get('Cart')->products;

        return $cartProducts;
    }

    public function checkout($request)
    {
        DB::beginTransaction();
        try {
            $idProductsInCart = collect($request->session()->get('Cart')->products)->pluck('id')->toArray();
            $idProductsInCart = implode(',', $idProductsInCart);
            $dataCustomer = [
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'status' => WAITING,
                'products' => $idProductsInCart,
            ];
            $customer = Customer::create($dataCustomer);   

            $dataMail = [
                'name' => $request->full_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'products' => $request->session()->get('Cart')->products
            ];
            SendMailPurchasedProductJob::dispatch($dataMail);

            DB::commit();

            return [
                'status' => true,
                'data' => $customer
            ];
        } catch (\Exception $e) {
            Log::error("create customer error " . $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());
            DB::rollBack();
            return [
                'status'    => false,
                'message'   => 'Create customer error ' . $e->getMessage()
            ];
        }
    }
}
