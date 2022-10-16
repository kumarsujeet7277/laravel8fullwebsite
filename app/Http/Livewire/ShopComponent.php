<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting=='date')
        {
            $product = Product::orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting=='price')
        {
            $product = Product::orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting=='price-desc')
        {
            $product = Product::orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else
        {
            $product = Product::paginate($this->pagesize);
        }

        $category = Category::all();

        return view('livewire.shop-component', ['products' => $product, 'categories'=>$category])->layout('layouts.base');
    }
}
