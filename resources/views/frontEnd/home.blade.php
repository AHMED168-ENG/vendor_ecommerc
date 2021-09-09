@extends('frontEnd/index')

@section("title")
<title>home page</title>
@endsection

@section('content')

            <!-- Start Section Slider -->
            <div id="slider-home" class="carousel slide p-3" data-ride="carousel">
                <div class="container">
                    @if (session() -> has("message"))

                      <div class="toasts" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed;z-index:50;top:50%;background:white;box-shadow:4px 4px 12px rgba(0,0,0,0.2);transform:translateY(-50%);left:0;height:100px ; width:250px" >
                        <div class="toast-header d-block">
                          <small class="text-muted">4 seconds ago</small>
                          <button onClick="clicking()" type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="toast-body">
                          {{session("message")}}
                        </div>
                      </div>
                    @endif
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <img src="{{asset("public/asset/frontEnd/img/pro/im1.svg")}}" class="d-block w-100" alt="...">
                                </div>
                                <div class="col-md-6">
                                    <h2 class="slider-title">تسوق قطع غيار سيارتك</h2>
                                    <p>لكن يجب أن أشرح لكم كيف كل هذه الفكرة الخاطئة للتنديد</p>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <img src="{{asset("public/asset/frontEnd/img/pro/im2.svg")}}" class="d-block w-100" alt="...">
                                </div>
                                <div class="col-md-6">
                                    <h2 class="slider-title">تسوق قطع غيار سيارتك</h2>
                                    <p>لكن يجب أن أشرح لكم كيف كل هذه الفكرة الخاطئة للتنديد</p>
                                </div>
                            </div>
                        </div>

                    </div>

                        <a class="carousel-control-prev" href="#slider-home" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#slider-home" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                </div>
            </div>
            <!-- End Section Slider -->

            <!-- Start Section Filter -->
            <div style="background-color:#FDFDFD">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="home-filter">
                                <form>
                                    <div class="form-row">

                                        <div class="form-group col-md-3 mb-1">
                                            <select class="form-control">
                                                <option selected>صانع السيارة</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3 mb-1">
                                            <select class="form-control">
                                                <option selected>صانع السيارة</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3 mb-1">
                                            <select class="form-control">
                                                <option selected>صانع السيارة</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3 mb-1">
                                            <button class="btn btn-primary btn-block">بــــحــــث <i class="fas fa-angle-left"></i></button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Section Filter -->


            <!-- Start Section categoreis -->
            <div class="home-categoreis pt-5">
                <div class="container">

                    <h4>
                        <span class="title">الأقسام الرئيسيه</span>
                        <span class="float-right view-all">إظهار الكل <i class="fas fa-angle-left"></i></span>
                    </h4>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="cta-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/car1.svg")}}" class="img-fluid" alt="0" />
                                    <p class="text-center pb-2">الأجزاء الميكانيكية</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="cta-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/car2.svg")}}" class="img-fluid" alt="0" />
                                    <p class="text-center pb-2">قطع كهربائية</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="cta-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/car3.svg")}}" class="img-fluid" alt="0" />
                                    <p class="text-center pb-2">أجزاء الجسم</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="cta-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/car4.svg")}}" class="img-fluid" alt="0" />
                                    <p class="text-center pb-2">إكسسوارات</p>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- End Section categoreis -->


            <!-- Start Brands -->
            <div class="cars-brands-home">
                <div class="container">
                    <h4>
                        <span class="title">ماركات السيارات</span>
                        <span class="float-right view-all">إظهار الكل <i class="fas fa-angle-left"></i></span>
                    </h4>

                    <div class="row">

                        <div class="col-lg-2">
                            <div class="brand-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/cars-brands/bmv.svg")}}" class="img-fluid" alt="0" />
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="brand-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/cars-brands/fol.svg")}}" class="img-fluid" alt="0" />
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="brand-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/cars-brands/for.svg")}}" class="img-fluid" alt="0" />
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="brand-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/cars-brands/jeep.svg")}}" class="img-fluid" alt="0" />
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="brand-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/cars-brands/kia.svg")}}" class="img-fluid" alt="0" />
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="brand-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/cars-brands/nis.svg")}}" class="img-fluid" alt="0" />
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="brand-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/cars-brands/op.svg")}}" class="img-fluid" alt="0" />
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="brand-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/cars-brands/toy.svg")}}" class="img-fluid" alt="0" />
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="brand-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/cars-brands/vol.svg")}}" class="img-fluid" alt="0" />
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="brand-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/cars-brands/zz.svg")}}" class="img-fluid" alt="0" />
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="brand-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/cars-brands/bmv.svg")}}" class="img-fluid" alt="0" />
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="brand-box">
                                <a href="#">
                                    <img src="{{asset("public/asset/frontEnd/img/cars-brands/fol.svg")}}" class="img-fluid" alt="0" />
                                </a>
                            </div>
                        </div>



                    </div>

                </div>
            </div>
            <!-- End Brands -->


            <!-- Start Section Top Sellers -->
            <div class="top-sellers">
                <div class="container">
                    <h4>
                        <span class="title">أفضل البائعين</span>
                    </h4>
                    <br />

                    <section class="center slider">

                        <div>
                            <div class="slide-content text-center">
                                <img src="{{asset("public/asset/frontEnd/img/sellers/1.svg")}}" class="img-fluid" alt="0" />
                                <h4>عبدالرحمن محمد</h4>
                                <p><i class="fas fa-map-marker-alt"></i> مصر- القاهرة</p>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="slide-content text-center">
                                <img src="{{asset("public/asset/frontEnd/img/pro/pro2.svg")}}" class="img-fluid" alt="0" />
                                <h4>عبدالرحمن محمد</h4>
                                <p><i class="fas fa-map-marker-alt"></i> مصر- القاهرة</p>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="slide-content text-center">
                                <img src="{{asset("public/asset/frontEnd/img/sellers/3.svg")}}" class="img-fluid" alt="0" />
                                <h4>عبدالرحمن محمد</h4>
                                <p><i class="fas fa-map-marker-alt"></i> مصر- القاهرة</p>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="slide-content text-center">
                                <img src="{{asset("public/asset/frontEnd/img/sellers/4.svg")}}" class="img-fluid" alt="0" />
                                <h4>عبدالرحمن محمد</h4>
                                <p><i class="fas fa-map-marker-alt"></i> مصر- القاهرة</p>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                            </div>
                        </div>


                    </section>

                </div>
            </div>
            <!-- End Section Top Sellers -->

            @section("script")
            <script>
                window.onload = function() {
                    setTimeout(function() {
                    document.querySelector(".toasts").remove();
                },4000)
                }
                function clicking() {
                    document.querySelector(".toasts").remove();
                }
                $(document).on('ready', function() {

                    $('.center').slick({
                        rtl: true,
                        centerMode: true,
                        centerPadding: '60px',
                        slidesToShow: 3,
                        responsive: [
                            {
                              breakpoint: 768,
                              settings: {
                                arrows: false,
                                centerMode: true,
                                centerPadding: '40px',
                                slidesToShow: 3
                            }
                        },
                        {
                          breakpoint: 480,
                          settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                          }
                        }
                      ]
                    });
                });

            </script>
            @endsection
@endsection
