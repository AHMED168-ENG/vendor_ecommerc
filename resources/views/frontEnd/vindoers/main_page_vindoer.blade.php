@extends('frontEnd/vindoers/vindoer_home')

@section('content')
            <!-- Start Brands -->
            <div class="cars-brands-home">
                <div class="container">
                    <h4>
                        <span class="title">ماركات السيارات</span>
                        <span class="float-right view-all">إظهار الكل <i class="fas fa-angle-left"></i></span>
                    </h4>

                    <div class="row">

                        @foreach ($kind_car_logo_img as $item)
                        <div class="col-lg-2">
                            <div class="brand-box">
                                <a href="#">
                                    <img style="border-radius: 4px" src="{{asset("public\asset\admin\images\products_image\car_logo_photo") . "/" . $item -> get_kind_car["car_logo_photo"]}}" class="img-fluid" alt="0" />
                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>
            </div>
            <!-- End Brands -->
            <!-- Start Brands -->
            <div class="catigors cars-brands-home">
                <div class="container">
                    <h4>
                        <span class="title">الاقسام الخاصه بمنتاجاتي</span>
                        <span class="float-right view-all">إظهار الكل <i class="fas fa-angle-left"></i></span>
                    </h4>

                    <div class="row">

                    <ul style="width:100%" class="row">
                        @foreach ($product_vindoer_catigory as $item)
                            <li class="col-md-3"><a href="{{$item -> catigory}}">{{get_catigory_name_from_supcatigory($item -> catigory)}}</a></li>
                        @endforeach
                    </ul>

                    </div>

                </div>
            </div>
            <!-- End Brands -->

            <!-- Start Section Products -->
            <div class="category-products">
                <div class="container">

                    <div class="row">
                        <div class="col-12">

                            <h5 class="title">
                                <span>المنتجات التي تم اضافتها مؤخرا</span>
                            </h5>

                            <br />

                            <div class="row">

                                @foreach ($product_vindoer as $key => $item)
                                <div class="wrapper col-md-3" style="border:1px solid #ddd ;padding:0;margin:0">
                                    <div class="container" style="width:100% !important ; padding:0">
                                      <div class="top" style="background-size:cover;position: relative;background:url('{{asset("public/asset/admin/images/products_image") . "/" . explode("__" , $item -> product_photo)[0]}}')">
                                        <div style="width:100%;
                                        height:100%;
                                        position:absolute;
                                        top:0;
                                        left:0;
                                        background:rgba(0,0,0,0.1)"></div>
                                     </div>
                                      <div class="bottom">
                                        <div class="left">
                                          <div class="details">
                                            <h1 class="h4" style="margin-bottom:5px">{{$item -> name}}</h1>
                                            <p>£ <span style="font-size:20px">{{$item -> price}}</span></p>
                                          </div>
                                          <div class="buy" ><a href="{{route("edit_product_vindoer" , $item -> id)}}" style="display: flex;flex-direction:column;height:50%;background:#737070;"><i style=";height:100%;padding:0;display:flex !important;align-items:center;justify-content:center" class="fa fa-edit"></i></a><a href="" style="display: flex;flex-direction:column;height:50%;background:#757575;"><i style="padding:0;display:flex !important;align-items:center;justify-content:center;height:100%" class="fa fa-trash"></i></a></div>
                                        </div>
                                        <div class="right">
                                          <div class="done" style=""><i style="padding:0" class="fa fa-check"></i></div>
                                          <div class="details">
                                            <h1>Chair</h1>
                                            <p>Added to your cart</p>
                                          </div>
                                          <div class="remove" onclick="remove({{$key}})" style="clear:none;display:flex !important;align-items:center;justify-content:center;"><i style="padding:0" class="fa fa-times"></i></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="inside">
                                      <div class="icon"><i class="material-icons">info_outline</i></div>
                                      <div class="contents">
                                        <table>
                                          <tr>
                                            <th>Width</th>
                                            <th>Height</th>
                                          </tr>
                                          <tr>
                                            <td>3000mm</td>
                                            <td>4000mm</td>
                                          </tr>
                                          <tr>
                                            <th>Something</th>
                                            <th>Something</th>
                                          </tr>
                                          <tr>
                                            <td>200mm</td>
                                            <td>200mm</td>
                                          </tr>
                                          <tr>
                                            <th>Something</th>
                                            <th>Something</th>
                                          </tr>
                                          <tr>
                                            <td>200mm</td>
                                            <td>200mm</td>
                                          </tr>
                                          <tr>
                                            <th>Something</th>
                                            <th>Something</th>
                                          </tr>
                                          <tr>
                                            <td>200mm</td>
                                            <td>200mm</td>
                                          </tr>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                @endforeach


                                <div class="col-md-4 col-sm-6" style="    margin-top: 15px; ">
                                    <div class="product-grid3">
                                        <div class="product-image3">
                                            <a href="{{Route("add_product_vindoer")}}">
                                                <img class="pic-1" src="{{asset("public/asset/frontEnd/img/add.svg")}}" style="height:200px;padding:11px;" />
                                            </a>
                                        </div>

                                    </div>
                                </div>



                            </div><!-- End row -->
                        </div><!-- End col 9 -->


                    </div><!-- End Row -->

                </div>
            </div>
            <!-- End Section Products -->
            @section('script')
                <script>
                    var ele1 = document.querySelectorAll(".wrapper .buy");
                    var ele2 = document.querySelectorAll(".wrapper .remove");
                    function buy(id) {
                        ele1[id].parentElement.parentElement.classList.add("clicked");
                    }
                    function remove(id) {
                        ele2[id].parentElement.parentElement.classList.remove("clicked");
                    }

                </script>
            @endsection
            <style>

                .catigors {
                    margin-top:50px
                }
                .catigors h4 {
                    margin-bottom:50px
                }
                .catigors ul li a {
                    font-size:15px;
                    font-style: italic;
                    display: block;
                    margin-bottom:7px;
                    color:#222;
                }
                .catigors ul li a:hover {
                    color:rgb(87, 87, 230)
                }
                html, body {
                background: #fff;
                font-family: sans-serif;
                }

                    .wrapper {
                    width: 300px;
                    height: 500px;
                    text-align: left;
                    direction: ltr;
                    background: white;
                    margin: auto;
                    position: relative;
                    overflow: hidden;
                    border-radius: 10px 10px 10px 10px;
                    box-shadow: 0;
                    transform: scale(0.95);
                    transition: box-shadow 0.5s, transform 0.5s;
                    }
                    .wrapper:hover {
                    transform: scale(0.97);
                    box-shadow: 5px 20px 30px rgba(0, 0, 0, 0.2);
                    }
                    .wrapper .container {
                    width: 100%;
                    height: 100%;
                    }
                    .wrapper .container .top {
                    height: 80%;
                    width: 100%;
                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                    background-position: center center
                    }
                    .wrapper .container .bottom {
                    width: 200%;
                    height: 20%;
                    transition: transform 0.5s;
                    }
                    .wrapper .container .bottom.clicked {
                    transform: translateX(-50%);
                    }
                    .wrapper .container .bottom h1 {
                    margin: 0;
                    padding: 0;
                    }
                    .wrapper .container .bottom p {
                    margin: 0;
                    padding: 0;
                    }
                    .wrapper .container .bottom .left {
                    height: 100%;
                    width: 50%;
                    background: #d0d0d0;
                    position: relative;
                    float: left;
                    }
                    .wrapper .container .bottom .left .details {
                    padding: 20px;
                    float: left;
                    width: calc(70% - 40px);
                    }
                    .wrapper .container .bottom .left .buy {
                    float: right;
                    width: calc(30% - 2px);
                    height: 100%;
                    background: #f1f1f1;
                    transition: background 0.5s;
                    border-left: solid thin rgba(0, 0, 0, 0.1);
                    }
                    .wrapper .container .bottom .left .buy i {
                    font-size: 22px;
                    padding: 30px;
                    color: #Fff;
                    transition: transform 0.5s;

                    }
                    .wrapper .container .bottom .left .buy:hover {
                    background: #A6CDDE;
                    }
                    /*.wrapper .container .bottom .left .buy:hover i {
                    transform: translateY(5px);
                    color: #00394B;
                    }*/
                    .wrapper .container .bottom .right {
                    width: 50%;
                    background: #A6CDDE;
                    color: white;
                    float: right;
                    height: 200%;
                    overflow: hidden;
                    }
                    .wrapper .container .bottom .right .details {
                    padding: 20px;
                    float: right;
                    width: calc(70% - 40px);
                    }
                    .wrapper .container .bottom .right .done {
                    width: calc(30% - 2px);
                    float: left;
                    transition: transform 0.5s;
                    border-right: solid thin rgba(255, 255, 255, 0.3);
                    height: 50%;
                    cursor: pointer !important;

                    }
                    .wrapper .container .bottom .right .done i {
                    font-size: 30px;
                    padding: 30px;
                    color: white;
                    cursor: pointer;

                    }
                    .wrapper .container .bottom .right .remove {
                    width: calc(30% - 1px);
                    clear: both;
                    border-right: solid thin rgba(255, 255, 255, 0.3);
                    height: 50%;
                    background: #BC3B59;
                    transition: transform 0.5s, background 0.5s;
                    }
                    .wrapper .container .bottom .right .remove:hover {
                    background: #9B2847;
                    }
                    .wrapper .container .bottom .right .remove:hover i {
                    transform: translateY(5px);
                    cursor: pointer;
                    }
                    .wrapper .container .bottom .right .remove i {
                    transition: transform 0.5s;
                    font-size: 30px;
                    padding: 30px;
                    color: white;
                    cursor: pointer !important;
                    }
                    .wrapper .container .bottom .right:hover .remove, .wrapper .container .bottom .right:hover .done {
                    transform: translateY(-100%);
                    }
                    .wrapper .inside {
                    z-index: 9;
                    background: #92879B;
                    width: 140px;
                    height: 140px;
                    position: absolute;
                    top: -70px;
                    right: -70px;
                    border-radius: 0px 0px 200px 200px;
                    transition: all 0.5s, border-radius 2s, top 1s;
                    overflow: hidden;
                    }
                    .wrapper .inside .icon {
                    position: absolute;
                    right: 85px;
                    top: 85px;
                    color: white;
                    opacity: 1;
                    }
                    .wrapper .inside:hover {
                    width: 100%;
                    right: 0;
                    top: 0;
                    border-radius: 0;
                    height: 80%;
                    }
                    .wrapper .inside:hover .icon {
                    opacity: 0;
                    right: 15px;
                    top: 15px;
                    }
                    .wrapper .inside:hover .contents {
                    opacity: 1;
                    transform: scale(1);
                    transform: translateY(0);
                    }
                    .wrapper .inside .contents {
                    padding: 5%;
                    opacity: 0;
                    transform: scale(0.5);
                    transform: translateY(-200%);
                    transition: opacity 0.2s, transform 0.8s;
                    }
                    .wrapper .inside .contents table {
                    text-align: left;
                    width: 100%;
                    }
                    .wrapper .inside .contents h1, .wrapper .inside .contents p, .wrapper .inside .contents table {
                    color: white;
                    }
                    .wrapper .inside .contents p {
                    font-size: 13px;
                    }
                </style>

@endsection
