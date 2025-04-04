<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Product Details')]
class ProductDetailPage extends Component
{
    public $slug;
    public function mount($slug){
        $this->slug = $slug; //bruzz thks h shkspr 🌹☠ (can't find the emoji)
    }
    public function render()
    {
        return view('livewire.product-detail-page', [
            'product' => Product::where('slug', $this->slug)->firstOrFail(),
        ]);
    }
}
