<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;


class AddToCart extends Component
{
    public $products;
    public $cart = [];

    public function mount()
    {
        $this->products = Product::all();
    }

    public function addToCart($productId, $quantity = 1)
    {
        $cartItem = collect($this->cart)->where('id', $productId)->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
        } else {
            $this->cart[] = [
                'id' => $productId,
                'quantity' => $quantity,
            ];
        }

        $this->storeCartInSession();

        $this->emit('cartUpdated');
    }

    protected function storeCartInSession()
    {
        session()->put('cart', $this->cart);
    }

    public function render()
    {
        return view('livewire.product-list');
    }
}
