@extends('frontEnd/index')

@section('content')

            <!-- Start Section Products -->
            <div class="category-products">
                <div class="container">

                    <div class="row">
                        <div class="col-12">
                            <h5 class="text-center head_title">
                                جميع الاقسام الرءيسيه
                            </h5>
                        </div><!-- End col 9 -->
                    </div><!-- End Row -->

                    <div class="row home-categoreis pt-5">
                        @foreach ($all_catigors as $key => $item)
                        <div class="col-lg-3">
                            <div class="cta-box">
                                <a href="">
                                    <img src="{{asset("public/asset/admin/images/categoris_photo") . "/" . $item -> photo}}" class="img-fluid" alt="0" />
                                    <p class="text-center pb-2">{{$item -> name}}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <div class="paginat col-12 justify-content-center d-flex">
                            {{ $all_catigors->links() }}
                        </div>

                    </div><!-- End row -->

                </div>
            </div>
            <!-- End Section Products -->
            <style>
                .head_title {
                    position: relative;
                    font-size:28px;
                }
                .head_title::after {
                    content:"";
                    width:5%;
                    bottom:-9px;
                    left:50%;
                    transform:translateX(-50%);
                    position: absolute;
                    height:1px;
                    background:#062C4C;
                }
            </style>
@endsection
