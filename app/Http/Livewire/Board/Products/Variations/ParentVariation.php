<?php

namespace App\Http\Livewire\Board\Products\Variations;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Variation;
class ParentVariation extends Component
{
    use LivewireAlert;
    public $variant;
    public $type;
    public $title;
    public $barcode;
    public $price;

    protected $listeners = ['variantAdded' => '$refresh' , 'variantDeleted' => '$refresh' ];

    public function deleteVariant() {
        $this->variant->children()->delete();
        $this->variant->delete();
        $this->emit('variantDeleted');
    }

    public function mount() {
        $this->type = $this->variant->type;
        $this->title = $this->variant->title;
        $this->barcode = $this->variant->barcode;
        $this->price = $this->variant->price;
    }

    public function updatedType()
    {
        $this->variant->type = $this->type;
        $this->variant->save();
    }

    public function updatedTitle()
    {
        $this->variant->title = $this->title;
        $this->variant->save();
    }

    public function updatedPrice()
    {
        if ($this->price == null ) {
            $this->variant->price = null;
        } else {
            $this->variant->price = $this->price;
        }
        $this->variant->save();
    }

    public function updatedBarcode()
    {
        $this->variant->barcode = $this->barcode;
        $this->variant->save();
    }

    public function render()
    {
        $children = Variation::where('parent_id' , $this->variant->id )->get();
        return view('livewire.board.products.variations.parent-variation' , compact('children'));
    }
}
