<div class="row main_row"  >
    <div class="col-md-2">
        <div class="form-group">
            <label class="col-form-label"> النوع </label>
            <select name="type" wire:model='type' class='select form-control' id="">
                <option value="size"> مقاس </option>
                <option value="weight"> وزن </option>
                <option value="volume"> حجم </option>
            </select>
            @error('types')
            <p class='text-danger' >  {{ $message }} </p>
            @enderror
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label class="col-form-label"> الاسم </label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model='title'  >
            @error('title')
            <p  class='text-danger' >  {{ $message }} </p>
            @enderror
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label class="col-form-label"> الباركود </label>
            <input type="text" class="form-control @error('barcode') is-invalid @enderror" wire:model='barcode' value="{{ old('barcode') }}" >
            @error('barcode')
            <p  class='text-danger' >  {{ $message }} </p>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="col-form-label"> السعر </label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" wire:model='price' value="{{ old('price') }}" >
            @error('price')
            <p  class='text-danger' >  {{ $message }} </p>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label class="col-form-label"> خصائص </label> <br>
            <button title='الغاء'  wire:click='deleteVariant()' class="btn btn-outline-danger delete_main_row  border-2 ml-2"><i class="icon-trash"></i></button>
            <button title='إضافه لون' wire:click="$emitTo('board.products.variations.add-child-variant', 'openModal' , {{ $variant->id }} )"  class="add_color btn btn-outline-success border-2 ml-2"><i class="icon-plus3"></i> اضف لون </button>
        </div>                                      
    </div>
    <div class="child-row col-md-12"  >
        <ul class='' >
            @foreach ($children as $child)
            @livewire('board.products.variations.child-variation' , ['variant' => $child ] ,key($child->id) )
            @endforeach
        </ul>
    </div>
</div>
