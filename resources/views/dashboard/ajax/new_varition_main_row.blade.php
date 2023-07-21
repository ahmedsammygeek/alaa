<div class="row main_row" data-row_number='{{ $rows_count }}' >

    <div class="col-md-2">
        <div class="form-group">
            <label class="col-form-label"> النوع </label>
            <select name="types[]" class='select form-control' id="">
                <option value=""></option>
                <option value="size"> مقاس </option>
                <option value="weight"> وزن </option>
                <option value="volume"> حجم </option>
            </select>
            @error('types.*')
            <p class='text-danger' >  {{ $message }} </p>
            @enderror
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label class="col-form-label"> الاسم </label>
            <input type="text" class="form-control @error('name.*') is-invalid @enderror" name="name[]" value="{{ old('name.*') }}" >
            @error('name.*')
            <p  class='text-danger' >  {{ $message }} </p>
            @enderror
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label class="col-form-label"> الباركود </label>
            <input type="text" class="form-control @error('barcode.*') is-invalid @enderror" name="barcode[]" value="{{ old('barcode.*') }}" >
            @error('barcode.*')
            <p  class='text-danger' >  {{ $message }} </p>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="col-form-label"> السعر </label>
            <input type="text" class="form-control @error('price.*') is-invalid @enderror" name="price[]" value="{{ old('price.*') }}" >
            @error('price.*')
            <p  class='text-danger' >  {{ $message }} </p>
            @enderror
        </div>
    </div>


    <div class="col-md-2">
        <div class="form-group">
            <label class="col-form-label"> خصائص </label> <br>
            <button title='الغاء' class="btn btn-outline-danger delete_main_row  border-2 ml-2"><i class="icon-trash"></i></button>
            <button title='إضافه لون'  class="add_color  btn btn-outline-success border-2 ml-2"><i class="icon-plus3"></i> اضف لون </button>
        </div>                                      
    </div>

    <div class="child-row col-md-12"  >
        <ul class='' >

        </ul>
    </div>

</div>