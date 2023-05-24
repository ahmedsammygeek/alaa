<footer class="section-footer bg-secondary text-white">
    <div class="container">
        <section class="footer-top  padding-y-lg">
            <div class="row">
                <aside class="col-md-4 col-12">
                    <article class="mr-md-4">
                        <h5 class="title"> @lang('site.contanct_us')</h5>
                        <p> @lang('site.Contact Us For Any Questions') </p>
                        <ul class="list-icon">
                            <li> <i class="icon fa fa-map-marker"> </i>
                             {{ $data['settings']->address }}
                              </li>
                            <li> <i class="icon fa fa-envelope"> </i> {{ $data['settings']->email }} </li>
                            <li> <i class="icon fa fa-phone"> </i> {{ $data['settings']->phone }} </li>
                        </ul>
                    </article>
                </aside>
                <aside class="col-md col-6">
                    <h5 class="title"> @lang('site.information') </h5>
                    <ul class="list-unstyled">
                        @foreach ($data['pages'] as $page)
                           <li> <a href="{{ url('pages/'.$page->id.'-'.$page->slug) }}"> {{ $page->title }} </a></li>
                        @endforeach
                    </ul>
                </aside>
                <aside class="col-md col-6">
                    <h5 class="title">حسابى</h5>
                    <ul class="list-unstyled">
                        <li> <a href="#">اتصل بنا</a></li>
                        <li> <a href="#">حسابى</a></li>
                        <li> <a href="#">ارباحى</a></li>
                        <li> <a href="#">تسجيل الدخول</a></li>
                        <li> <a href="#">التسجيل فى الموقع</a></li>
                    </ul>
                </aside>
                <aside class="col-md-4 col-12">
                    <h5 class="title"> القائمه البريديه </h5>
                    <p> يمكنك الاشتراك فى القائمه البريديه و الاطلاع على كل جديد و العروض الخاصه بنا </p>
                    
                    <form class="form-inline mb-3">
                        <input type="text" placeholder="البريد الاكتورنى " class="border-0 w-auto form-control" name="">
                        <button class="btn ml-2 btn-warning">  اشترك </button>
                    </form>

                    <p class="text-white-50 mb-2"> تابعنا على مواقع التواصل </p>
                    <div>
                        <a href="#" class="btn btn-icon btn-outline-light"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-icon btn-outline-light"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-icon btn-outline-light"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-icon btn-outline-light"><i class="fab fa-youtube"></i></a>
                    </div>

                </aside>
            </div> <!-- row.// -->
        </section>  <!-- footer-top.// -->

        <section class="footer-bottom text-center">
            <p class="text-white"> جميع الحقوق محفوظه لموقع علاء الدين </p>
            
            <br>
        </section>
    </div><!-- //container -->
</footer>