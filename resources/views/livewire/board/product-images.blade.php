<div class="row">
    @foreach ($this->images as $image)
    <div class="col-xl-2 col-sm-6">
        <div class="card">
            <div class="card-img-actions mx-1 mt-1">
                <img class="card-img img-fluid" src="{{ Storage::url('products/'.$image->image) }}" alt="">
                <div class="card-img-actions-overlay card-img">
                    <a href="{{ Storage::url('products/'.$image->image) }}" class="btn btn-outline-white border-2 btn-icon rounded-pill" data-popup="lightbox" data-gallery="gallery1">
                        <i class="icon-zoomin3"></i>
                    </a>
                    <a   data-item_id='{{ $image->id }}' class=" delete_item btn btn-outline-white border-2 btn-icon rounded-pill ml-2">
                        <i class="icon-trash"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Livewire.on('itemDeleted', postId => {
            Toast.fire({
                icon: 'success',
                title: 'تم حذف الصوره بنجاح'
            })
        })



        $(document).on('click', 'a.delete_item', function(event) {
            event.preventDefault();
            var id = $(this).attr('data-item_id');
            Swal.fire({
                title: '@lang('dashboard.are_you_sure_to_delete')',
                text: "@lang('dashboard.delete_notice')",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '@lang('dashboard.yes')',
                cancelButtonText: '@lang('dashboard.cancel')'
            }).then((result) => {
                if (result.isConfirmed) {
                   Livewire.emit('deleteItem' , id )
               }
           })
        });
    });
</script>
@endsection