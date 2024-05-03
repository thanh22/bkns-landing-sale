<?php
namespace App\Cart;

class Cart
{
    public $products = null;

    public function __construct($cart)
    {
        if ($cart) {
            $this->products = $cart->products;
        }
    }

    public function addCart($product)
    {
        if ($this->products) {
            if (!array_key_exists($product->id, $this->products)) {
                $this->products[$product->id] = $product;
            }
        } else {
            $this->products[$product->id] = $product;
        }
    }
}