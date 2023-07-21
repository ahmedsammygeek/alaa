<div>


    <div class="mt-3">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="card-title text-white"> بحث متقدم </h5>
            </div>  
            <div class="card-body">
                <div class="row"  wire:ignore>
                    <div class="col-md-1">
                        <select  wire:model='rows' class="form-control form-control-select2" >
                            <option value="10"> @lang('dashboard.rows') </option>
                            <option value="20">20 </option>
                            <option value="30">30 </option>
                            <option value="50">50 </option>
                            <option value="100">100 </option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group-feedback form-group-feedback-right">
                            <input type="search" wire:model='search' class="form-control wmin-sm-200" placeholder=" @lang('dashboard.search') ...">
                            <div class="form-control-feedback">
                                <i class="icon-search4 font-size-base text-muted"></i>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-2 ml-3" >
                        <select wire:model='status' class="form-control form-control-select2" >
                            <option value="all"> جميع الحالات </option>
                            <option value="1"> تحدى جارى </option>
                            <option value="2"> تحدى مكتمل </option>
                            <option value="3"> لم يكتمل او مغلق </option>
                           
                        </select>
                    </div>




                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header bg-primary text-white header-elements-sm-inline" >
            <h5 class="card-title"> عرض كافه التحديات المشارك بها </h5>
            <div class="header-elements">
                <div class="d-flex justify-content-between">
                    <div class="list-icons ml-3">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> التحدى </th>
                        <th> عدد الطلبات المحققه </th>
                        <th> حاله التحدى </th>
                        <th> نسبه الاكمال </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp


                    @foreach ($user_challenges as $user_challenge)
                    <tr>
                        <td> {{ $i++}} </td>
                        <td> <a href="{{ route('dashboard.challenges.show' , $user_challenge->challenge_id ) }}"> {{ $user_challenge->challenge?->title }} </a> </td>
                        <td> {{ $user_challenge->orders_numbers }}  <span class='text-muted'> طلب </span> </td>
                        <td> 
                            @switch($user_challenge->status)
                            @case(1)
                            <span class='badge badge-primary' > جارى  </span>
                            @break
                            @case(2)
                            <span class='badge badge-success' > تحدى مكتمل </span>
                            @break
                            @case(3)
                            <span class='badge badge-danger' > لم يكتمل </span>
                            @break
                            @endswitch
                            
                        </td>
                        <td> 
                            <div class="pace-demo w-auto h-auto p-3">
                                <div class="theme_bar"><div class="pace_progress" data-progress-text="{{ $user_challenge->percentage }}%" data-progress="{{ $user_challenge->percentage }}" style="width: {{ $user_challenge->percentage }}%;"></div></div>
                            </div>
                            {{ $user_challenge->percentage }} %
                        </td>
                        <td>
                            <a href='{{ route('dashboard.marketers.challenges.show' , [ 'marketer' => $user_challenge->user_id  , 'user_challenge' => $user_challenge ] ) }}' class="btn btn-primary btn-icon"><i class="icon-eye "></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="card-footer bg-white  py-sm-2">
            <div class='pagination pagination-flat justify-content-around mt-3 mt-sm-0 float-right' >
                {{ $user_challenges->links() }}
            </div>
        </div>

    </div>
</div>

@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection