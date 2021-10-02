@extends('frontEnd/index')

@section('content')
 <!-- Start Section Products -->
 <div class="category-products">
    <div class="container">

        <div class="row">
            <div class="col-lg-9">

                <h5 class="title">
                    <span>الأجزاء الميكانيكية</span>
                    <span> <i class="fas fa-chevron-left"></i> </span>
                    <span>تويوتا يارس 2019</span>

                    <span class="float-right">500 قطعة</span>
                </h5>

                <br />

                <div class="row">
                    @foreach ($product as $item)
                    <div class="col-md-4 col-sm-6">
                        <div class="product-grid3">
                            <div class="product-image3">
                                <a href="{{route("product_details" , $item -> id)}}">
                                    <img style="height:250px" class="pic-1" src="{{asset("public\asset\admin\images\products_image") . "/" . explode("__" , $item -> product_photo)[0]}}">
                                </a>
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                @if ($item -> descount)
                                    <span class="product-new-label">{{$item -> descount}}%</span>
                                @endif
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="{{route("product_details" , $item -> id)}}">{{$item -> name}}</a></h3>
                                <ul class="rating">
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star disable"></li>
                                    <li class="fa fa-star disable"></li>
                                </ul>
                                <div class="price">
                                    @if ($item -> descount)
                                        {{round($item -> price - (($item -> descount / $item -> price) * 100))}}
                                        <span>{{$item -> price}}</span>
                                    @else
                                        <span style="text-decoration: none ; color#000">{{$item -> price}}</span>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div><!-- End row -->

                <br />
                <div class="paginat col-12 justify-content-center d-flex">
                    {{ $product->links() }}
                </div>


            </div><!-- End col 9 -->

            <div class="col-lg-3">
                <aside>

                    <div class="category_aside">
                        <h4 class="title mb-0">الأقـســام</h4>

                        <div class="accordion" id="accordionExample">
                            <div class="list_links">
                                <!-- start pairant -->
                                @if ($all_catigors -> count() > 0)
                                    <ul class="list-unstyled">
                                        @foreach ($all_catigors as $item)
                                            <li><a href="">{{$item["name"]}} <i class=" {{$catigoryClass::find($item["id"]) -> get_supcatigory -> count() > 0 ? "fa fa-chevron-down": ""}}"></i></a>
                                                <!-- start child1 -->
                                                @if ($catigoryClass::find($item["id"]) -> get_supcatigory -> count() > 0)
                                                <ul class="list_pranch list-unstyled">
                                                    @foreach ($catigoryClass::find($item["id"]) -> get_supcatigory as $key => $item1)
                                                         <li><a href="">{{$item1["name"]}}</a>
                                                            <!-- start child2 -->
                                                            @if ($catigoryClass::find($item1["id"]) -> get_supcatigory -> count() > 0)
                                                                <ul class="list_pranch list-unstyled">
                                                                    @foreach ($catigoryClass::find($item1["id"]) -> get_supcatigory as $key => $item2)
                                                                        <li><a href="{{$item2["id"]}}">{{$item2["name"]}}</a>
                                                                            <!-- start child3 -->
                                                                            @if ($catigoryClass::find($item2["id"]) -> get_supcatigory -> count() > 0)
                                                                                <ul class="list_pranch list-unstyled">
                                                                                    @foreach ($catigoryClass::find($item2["id"]) -> get_supcatigory as $key => $item3)
                                                                                        <li><a href="{{$item3["id"]}}">{{$item3["name"]}}</a>
                                                                                        <!-- start child4 -->
                                                                                            @if ($catigoryClass::find($item3["id"]) -> get_supcatigory -> count() > 0)
                                                                                                <ul class="list_pranch list-unstyled">
                                                                                                    @foreach ($catigoryClass::find($item3["id"]) -> get_supcatigory as $key => $item4)
                                                                                                        <li><a href="{{$item4["id"]}}">{{$item4["name"]}}</a>
                                                                                                        <!-- start child4 -->

                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            @endif
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                             @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                    </div> <!--  -->


                    <br />

                    <div class="se-rating">
                        <h4 class="title mb-0">التقيمات</h4>

                        <ul class="list-group">

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <ul class="rating p-0 mt-1">
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                </ul>
                                <span class="badge badge-pill">5.0</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <ul class="rating p-0 mt-1">
                                    <li class="fa fa-star disable"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                </ul>
                                <span class="badge badge-pill">4.0</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <ul class="rating p-0 mt-1">
                                    <li class="fa fa-star disable"></li>
                                    <li class="fa fa-star disable"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                </ul>
                                <span class="badge badge-pill">3.0</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <ul class="rating p-0 mt-1">
                                    <li class="fa fa-star disable"></li>
                                    <li class="fa fa-star disable"></li>
                                    <li class="fa fa-star disable"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                </ul>
                                <span class="badge badge-pill">2.0</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <ul class="rating p-0 mt-1">
                                    <li class="fa fa-star disable"></li>
                                    <li class="fa fa-star disable"></li>
                                    <li class="fa fa-star disable"></li>
                                    <li class="fa fa-star disable"></li>
                                    <li class="fa fa-star"></li>
                                </ul>
                                <span class="badge badge-pill">1.0</span>
                            </li>


                        </ul>

                    </div> <!--  -->

                    <br />

                    <div class="se-price">
                        <h4 class="title mb-0">السعر</h4>
                        <div dir="ltr">


                            <input id="ex2" type="text" class="span2" value="" data-slider-min="1" data-slider-max="1000" data-slider-step="5" data-slider-value="[1,1000]"/>
                            <b class="float-right">1SAR</b> <b>1000SAR</b>
                        </div>


                    </div> <!--  -->


                    <div class="se-price">
                        <h4 class="title mb-0">المتاجر</h4>

                        <ul class="list-unstyled mb-0" style="min-height:100px;max-height:300px;overflow: auto;">
                            <li class="mb-1"><input type="checkbox" id="ddfd" /> <label for="ddfd">متجير </label></li>
                            <li class="mb-1"><input type="checkbox" id="qwqw" /> <label for="qwqw">نص يمكن أن يستبدل</label></li>
                            <li class="mb-1"><input type="checkbox" id="cvcv" /> <label for="cvcv">أنظمة الفرامل</label></li>
                            <li class="mb-1"><input type="checkbox" id="as" /> <label for="as">أنظمة الفرامل</label></li>
                            <li class="mb-1"><input type="checkbox" id="odsdp" /> <label for="odsdp">أنظمة الفرامل</label></li>
                            <li><input type="checkbox" id="fgg" /> <label for="fgg">أنظمة الفرامل</label></li>
                        </ul>
                    </div> <!--  -->

                </aside>

            </div>
        </div><!-- End Row -->

    </div>
</div>
<!-- End Section Products -->

<style>
    .category_aside {
        border:1px solid #eee;
        box-shadow:4px 4px 5px rgba(0,0,0,0.1)
    }
    .category_aside h4 {
        padding:10px;
        background:#062C4C;
        color:white !important

    }
    .accordion .catigory_links {
        width:100%;
    }
    .accordion .list_links ul {
        margin:0;
    }
    .accordion .list_links ul li {
        position: relative !important;
    }
    .accordion .list_links ul li a {
        padding:8px 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom:1px solid #ddd;
        background:#eee;
        color:#222;
    }
    .accordion .list_links ul li ul {
        position: absolute !important;
        left:105%;
        top:0;
        background:#ddd;
        z-index: 5;
        width:190px;
        border:1px solid #062C4C;
        visibility: hidden;
        opacity: 0;
        transition:0.4s
    }
    .accordion .list_links ul li ul::after {
        content:"";
        border-left:10px solid transparent;
        border-top:10px solid transparent;
        border-right:10px solid #062C4C;
        border-bottom:10px solid transparent;
        position: absolute;
        left:-20px;
        top:10px;
    }
    .accordion .list_links ul li:hover > ul{
        visibility: visible;
        opacity: 1;
    }
</style>

@endsection
