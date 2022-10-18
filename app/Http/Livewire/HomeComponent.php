<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status',1)->get();
        $lproducts = Product::orderBy('created_at','DESC')->get()->take(8);
        return view('livewire.home-component',['sliders'=>$sliders, 'lproducts'=>$lproducts])->layout('layouts.base');
    }
}
