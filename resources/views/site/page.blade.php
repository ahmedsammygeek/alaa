@extends('site.layouts.master')

@section('page_content')
<section class="section-pagetop bg-light">
  <div class="container">
    <h2 class="title-page">{{ $page->title }}</h2>
  </div> <!-- container .// -->
</section>
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg-white padding-y">
<div class="container">

    {!! $page->content !!}


</div> <!-- container .//  -->
</section>


@endsection