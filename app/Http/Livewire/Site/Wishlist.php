<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Wishlist as WishlistModel;
use Auth;
class Wishlist extends Component
{



    public function removeFromWishList($product_id)
    {
        $Wishlist = WishlistModel::where('product_id' , $product_id)->where('user_id' , Auth::id())->first();
        if ($Wishlist) {
            $Wishlist->delete();
            toastr()->success('تم حذف المنتج من قائمه الامنيات بنجاح');
        }
    }


    public function render()
    {
        $items = WishlistModel::with('product')->where('user_id' , Auth::id())->latest()->get();
        return view('livewire.site.wishlist' , compact('items'));
    }
}
