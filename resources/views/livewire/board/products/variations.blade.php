<div class='card card-body' >
    @foreach ($variations as $variant)
        @livewire('board.products.variations.parent-variation' , ['variant' => $variant ] ,key($variant->id) )
    @endforeach
    @livewire('board.products.variations.add-child-variant')
</div>
