<?php

namespace App\Livewire;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Products')]
class ProductsPage extends Component
{
    use WithPagination;
    public function render()
    {
        $productQuery = Product::query()->where('is_active' , 1);
        return view('livewire.products-page',[
            'products' => $productQuery->paginate(6),
        'brands' => Brands::where('is_active',1)->get(['id','name','slug']),
        'categories' => Category::where('is_active',1)->get(['id','name','slug']),
        ]);
    }
}
