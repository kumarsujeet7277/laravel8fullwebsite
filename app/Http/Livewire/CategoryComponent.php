<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;

    public function mount($category_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
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
        $category = Category::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        if($this->sorting=='date')
        {
            $product = Product::where('category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting=='price')
        {
            $product = Product::where('category_id',$category_id)->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting=='price-desc')
        {
            $product = Product::where('category_id',$category_id)->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else
        {
            $product = Product::where('category_id',$category_id)->paginate($this->pagesize);
        }

        $category = Category::all();

        return view('livewire.category-component', ['products' => $product, 'categories'=>$category, 'category_name'=>$category_name])->layout('layouts.base');
    }
}
