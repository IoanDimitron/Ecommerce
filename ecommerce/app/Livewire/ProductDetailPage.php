<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Product Details')]
class ProductDetailPage extends Component
{
    public $slug;
    public $quantity=1;
    public function mount($slug){
        $this->slug = $slug; //bruzz thks h shkspr 🌹☠ (can't find the emoji)
    }
    public function increaseQty(){
        $this->quantity++;
    }
    public function decreaseQty(){
        if($this->quantity>0)
        $this->quantity--;
    }
    public function addToCart($product_id){
        $total_count=CartManagement::addItemToCartWithQty($product_id, $this->quantity);

        $this->dispatch('update_cart_count', total_count: $total_count)->to(Navbar::class);
        LivewireAlert::title('Product added')
        ->text('Product added to the cart successfully')
        ->position('center')
        ->timer(3000)
        ->withConfirmButton('OK')
        ->confirmButtonColor('#00a63e')
        ->toast()
        ->show();
    }
    public function render()
    {
        return view('livewire.product-detail-page', [
            'product' => Product::where('slug', $this->slug)->firstOrFail(),
        ]);
    }
}
