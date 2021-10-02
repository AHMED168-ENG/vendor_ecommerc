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

                        @foreach ($sliders as $key => $item)
                            <div class="carousel-item {{$key == 0 ? "active" : ""}}">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <img src="{{asset("public/asset/admin/images/sliders_photo/") . "/" . $item -> img}}" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="slider-title">{{$item -> title}}</h2>
                                        <p>{{$item -> info}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


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
                        <a href="{{route("all_product_home")}}" class="float-right view-all">إظهار الكل <i class="fas fa-angle-left"></i></a>
                    </h4>

                    <div class="row">
                        @foreach ($main_catigory as $item)
                            <div class="col-lg-3">
                                <div class="cta-box">
                                    <a href="">
                                        <img src="{{asset("public/asset/admin/images/categoris_photo") . "/" . $item -> photo}}" class="img-fluid" alt="0" />
                                        <p class="text-center pb-2">{{$item -> name}}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- End Section categoreis -->


            <!-- Start Brands -->
            <div class="cars-brands-home">
                <div class="container">
                    <h4>
                        <span class="title">ماركات السيارات</span>
                        <a href="{{route("all_cars_mark")}}" class="float-right view-all">إظهار الكل <i class="fas fa-angle-left"></i></a>
                    </h4>

                    <div class="row">

                        @foreach ($all_cars_mark as $item)
                            <div class="col-lg-2">
                                <div class="brand-box">
                                    <a href="#">
                                        <img src="{{asset("public\asset\admin\images\products_image\\car_logo_photo") . "\\" . $item -> car_logo_photo}}" class="img-fluid" alt="0" />
                                    </a>
                                </div>
                            </div>
                        @endforeach

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
                        @foreach ($special_vindoer as $item)
                        <div style="height:353px">
                            <div style="height:100%" class="slide-content text-center">
                                <img style="height:100%" src="{{asset("public\asset\admin\images\\vindoer_image") . "/" . $item -> shop_img}}" class="img-fluid" alt="0" />
                                <h4>{{$item -> name}}</h4>
                                <p><i class="fas fa-map-marker-alt"></i> {{$item -> addres}}</p>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
