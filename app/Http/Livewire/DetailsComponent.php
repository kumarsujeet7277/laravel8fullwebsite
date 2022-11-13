<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;
use App\Models\Sale;


class DetailsComponent extends Component
{
    public $slug;
    public $qty;

    public $satt = [];

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price,$this->satt)->associate('App\Models\Product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');
    }

    public function increaseQuantity()
    {
        $this->qty++;
    }

    public function decreaseQuantity()
    {
        if($this->qty > 1)
        {
            $this->qty--;
        }
    }


    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $popular_product = Product::inRandomOrder()->limit(4)->get();
        $related_product = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        $sale = Sale::find(1);
        return view('livewire.details-component',[
            'product'=>$product,
            'popular_product'=>$popular_product,
            'related_product'=>$related_product, 
            'sale'=>$sale
        ])->layout('layouts.base');
    }
}
