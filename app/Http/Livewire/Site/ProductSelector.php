<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Variation;
use App\Models\Wishlist;
use Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class ProductSelector extends Component
{
     use LivewireAlert;
    public $product;
    public $initialVariation;
    public $finalVariant;
    public $productPrice;
    public $hasVariant = false;
    public $isInMyWishList = false;

    protected $listeners = ['finalVariantChoosed'];


    public function mount()
    {
        $this->initialVariation = $this->product->variations->sortBy('order')->groupBy('type')->first();
        $this->productPrice = $this->product->price;
        if ($this->initialVariation) {
            $this->hasVariant = true;
        }

        if (Auth::check()) {
            $this->isInMyWishList = Wishlist::where([
                ['user_id' , '=' , Auth::id() ] , 
                ['product_id' , '=' , $this->product->id  ]
            ])->first() ? true : false;
        }
    }

    public function finalVariantChoosed($variateId)
    {
        if (!$variateId) {
            $this->finalVariant = null;
            $this->productPrice = $this->product->price ;
            return;
        }

        $this->finalVariant = Variation::find($variateId);
        $this->productPrice = $this->finalVariant?->price ? $this->finalVariant?->price : $this->product->price ;
    }
    public function add_to_wishlist() {
        if (!Auth::check()) {
            toastr()->error('يجب ان تكون عضوا لكى تضيف منتج الى السله');
        } else {
            $Wishlist = Wishlist::where([
                ['product_id' , '=' , $this->product->id ] , 
                ['user_id' , '=' , Auth::id() ] , 
            ])->first();
            if ($Wishlist) {
                $Wishlist->delete();
                $this->isInMyWishList = false;
                $this->alert('success', 'تم حذف المنتج من قائمه الامنيات');
            } else {
                $Wishlist = new Wishlist;
                $Wishlist->product_id = $this->product->id;
                $Wishlist->user_id = Auth::id();
                $Wishlist->save();
                $this->isInMyWishList = true;

                $this->alert( 'success' ,  'تم إضافه المنتج الى قائمه الامنيات');
            }
        }
    }

    public function render()
    {
        return view('livewire.site.product-selector');
    }
}
