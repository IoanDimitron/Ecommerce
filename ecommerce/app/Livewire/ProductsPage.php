<?php

namespace App\Livewire;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Products')]
class ProductsPage extends Component
{
    use WithPagination;
    #[Url]
    public $selected_categories = [];
    #[Url]
    public $selected_brands = [];
    #[Url]
    public $featured;
    #[Url]
    public $on_sale;
    #[Url]
    public $price_range=15000;
    #[Url]
    public $sort = 'latest';

    public function render()
    {
        $productQuery = Product::query()->where('is_active' , 1);
        if(!empty($this->selected_categories)){
            $productQuery->whereIn('category_id', $this->selected_categories);
        }
        if(!empty($this->selected_brands)){
            $productQuery->whereIn('category_id', $this->selected_brands);
        }
        if($this->featured){
            $productQuery->where('is_featured',1);
        }
        if($this->on_sale){
            $productQuery->where('on_sale',1);
        }
        if($this->sort == 'latest'){
            $productQuery->latest();
        }
        if($this->sort == 'price'){
            $productQuery->orderBy('price');
        }
        return view('livewire.products-page',[
            'products' => $productQuery->paginate(6),
        'brands' => Brands::where('is_active',1)->get(['id','name','slug']),
        'categories' => Category::where('is_active',1)->get(['id','name','slug']),
        ]);
    }
}
