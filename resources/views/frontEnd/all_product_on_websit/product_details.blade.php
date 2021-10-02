@extends('frontEnd/index')

@section('content')
<!-- Start Product - Description  -->
<div class="product-description mt-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-5">
                <div class="pro-info">

                    <h4 class="title">{{$product -> name}}</h4>
                    <p>{{$product -> get_vindoer["shop_name"]}}</p>
                    <ul class="catigors_of_product_details list-unstyled">
                        @foreach (array_reverse(explode("---" , get_catigory_name_from_supcatigory($product -> get_catigory["id"]))) as $item)
                            <li><a href="">{{$item}}</a></li>
                        @endforeach
                    </ul>
                    <div class="">
                        <ul class="rating text-left">
                            <li class="fa fa-star disable"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                        <span>4.0 مراجعة العملاء</span>
                    </div>

                    <div class="pro-price mt-2 mb-2">
                        <span class="main-color font-weight-bold">{{$product -> price}} ريال</span>
                        @if ($product -> descount)
                            <span class="mr-2 ml-2"> - </span>
                            <span class="line-through">{{round($product -> price - (($product -> descount / $product -> price) * 100))}} ريال</span>
                        @endif
                    </div>

                    <p>{{$product -> description}}</p>

                    <div class="input-group mt-4 pb-3">

                        <span class="input-group-btn">
                            <button style="border-radius:0" class="quantity-right-plus btn btn-secondary btn-number" data-type="plus" data-field="">
                                <span class="glyphicon glyphicon-plus">+</span>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="10" min="1" max="100">
                        <span class="input-group-btn">
                            <button style="border-radius:0" class="quantity-left-minus btn btn-secondary btn-number"  data-type="minus" data-field="">
                              <span class="glyphicon glyphicon-minus">-</span>
                            </button>
                        </span>

                        <span class="input-group-btn mr-2 ml-2">
                            <a href="#" class="btn btn-primary">أضف إلى السلة</a>
                        </span>

                        <span class="input-group-btn">
                            <a href="#" class="btn btn-add-fav"><i class="far fa-fw fa-heart"></i></a>
                        </span>

                    </div>

                    <p class="text-success"><i class="fa fa-check"></i> متوافق مع سيارتك</p>

                    <ul class="list-inline cars">
                        @foreach (explode("___" , $product -> kind_car) as $item)
                            <li class="list-inline-item"><a href="#"> <img class="selected" src="{{asset("public\asset\admin\images\products_image\car_logo_photo") . "/" . $kind_of_car_model::find($item) -> car_logo_photo}}" alt="0" /> </a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <div class="col-lg-5">
                <div class="primary-img mb-3">
                    <img style="" src="{{asset("public\asset\admin\images\products_image") . "/" . explode("__" ,$product -> product_photo)[0]}}" class="img-fluid" alt="0" />
                </div>
            </div>
            <div class="col-lg-2">
                <div class="col-imgs d-flex flex" style="flex-direction: column">
                    @foreach (explode("__" ,$product -> product_photo) as $item)
                        @if ($item !== "")
                            <img style="height:auto" src="{{asset("public\asset\admin\images\products_image") . "/" . $item}}" class="mb-3 img-fluid" alt="0" />
                        @endif
                    @endforeach
                </div>
            </div>

        </div><!-- End Row -->


        <hr />

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">الوصف</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Review" role="tab" aria-controls="Review" aria-selected="false">مراجعة</a>
            </li>
        </ul>
        <div class="tab-content pt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="home-tab">

                <p style="width:60%">
                    {{$product -> description}}
                </p>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="primary-img mb-3">
                            <img style="" src="{{asset("public\asset\admin\images\products_image/description_photo") . "/" . explode("__" ,$product -> description_photo)[0]}}" class="img-fluid" alt="0" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="col-imgs d-flex flex" style="flex-direction: column">
                            @foreach (explode("__" ,$product -> description_photo) as $item)
                                @if ($item !== "")
                                    <img style="height:auto" src="{{asset("public\asset\admin\images\products_image/description_photo") . "/" . $item}}" class="mb-3 img-fluid" alt="0" />
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade pt-3" id="Review" role="tabpanel" aria-labelledby="profile-tab">
                @foreach ($product -> get_comment as $item)
                    <div class="row">
                        <div class="col-md-1">
                            <div class="user-img text-center">
                                <img src="{{"public\asset\admin\images\users_photo" . "/" . App\models\User::find($item -> sender) -> user_photo}}" width="50" height="50" alt="user img" />
                            </div>
                        </div>
                        <div class="col-md-11">
                            <h5 class="Review-title">
                                {{$item -> is_admin == "1" ? App\models\Admin_user::find($item -> sender) -> name : App\models\User::find($item -> sender) -> f_name . App\models\User::find($item -> sender) -> l_name}}
                                <span class="float-right"><i class="fa fa-clock"></i> منذ 3 ساعات</span>
                            </h5>
                            <div class="">
                                <ul class="rating text-left">
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                </ul>
                                <span>4.0 مراجعة العملاء</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="mt-2">
                                {{$item -> comment}}
                            </p>
                        </div>
                    </div> <!-- End Row -->
                @endforeach




                <br />

                <div class="row">
                    <div class="col-12">

                        <div class="add-comment">
                            <h5 class="comment-title">إضافة تعليق</h5>
                            <br />

                            <form>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label>التقييم: </label>
                                        <div class="from-rating">
                                                  <label>
                                                    <input type="radio" name="stars" value="1" />
                                                    <span class="icon">★</span>
                                                  </label>
                                                  <label>
                                                    <input type="radio" name="stars" value="2" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                  </label>
                                                  <label>
                                                    <input type="radio" name="stars" value="3" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                  </label>
                                                  <label>
                                                    <input type="radio" name="stars" value="4" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                  </label>
                                                  <label>
                                                    <input type="radio" name="stars" value="5" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                  </label>
                                        </div>
                                    </div>


                                    <div class="col-12 mb-3 our_comment">
                                        <label>التعليق</label>
                                        <textarea class="form-control" rows="5"></textarea>
                                        @error('comment')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="notification_comment col-12"></div>
                                    <div class="col-12 mb-3 send_comment">
                                        <button class="btn col-12 btn-primary">اضافة</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </div>

        <br />
        <br />
        <br />

    </div>
</div>
<!-- Start Product - Description  -->




<!-- Start Section Top Sellers -->
<div class="top-sellers">
    <div class="container">
        <h4>
            <span class="title">منتجات لها علاقه</span>
        </h4>
        <br />

        <section class="center slider">

            @foreach ($related_product as $item)
                <div>
                    <div class="product-grid3">
                        <div class="product-image3">
                            <a href="{{route("product_details" , $item -> id)}}" style="height:290px">
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
                            <h3 class="title"><a href="#">{{$item -> name}}</a></h3>
                            <ul class="rating">
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star disable"></li>
                            </ul>
                            <div class="price">
                                SAR63.50
                                <span>SAR75.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>

    </div>
</div>
<!-- End Section Top Sellers -->

<style>
    .catigors_of_product_details {
        display: flex;
    }
    .catigors_of_product_details a {
        color:white;
        background:#ccc;
        border:1px solid #062C4C;
        position: relative;
        padding:5px 7px;
        margin-left:15px
    }
    .catigors_of_product_details a::after {
        content:"";
        border-left:10px solid transparent;
        border-top:10px solid transparent;
        border-right:10px solid #062C4C;
        border-bottom:10px solid transparent;
        position: absolute;
        left:-20px;
        top:6px;
    }
    .catigors_of_product_details li:last-child a::after {
        display: none;
    }
</style>
@section('script')
<script>
    var our_comment = document.querySelector(".our_comment textarea");
    var send_comment = document.querySelector(".send_comment button");
    send_comment.onclick = function(e) {
        e.preventDefault()
        $.ajax({
            enctype:"multipart/form-data",
            url: "{{route('store_comment_user')}}",
            data: {
                '_token': "{{csrf_token()}}",
                "comment" : our_comment.value,
                "id" : "11",
                "product" : "{{$product -> id}}",
            },
            type : "post",
            processData : true,
            cache : true,
            beforeSend() {
                document.querySelector(".notification_comment").innerHTML = "";
            },
            success : function(data) {
                cleanError();
                document.querySelector(".notification_comment").innerHTML = "<div style='color:#000' class='alert col-12 alert-success'>تم اضافه الكومنت بنجاح</div>";
            },
            error : function (error) {
                console.log(error.responseJSON.errors);
                document.querySelector(".notification_comment").innerHTML = "<div style='color:#000' class='alert col-12 alert-danger'>" + error.responseJSON.errors["comment"][0] + " </div>";

            }
        });
        function cleanError() {
                our_comment.value = "";
            }
        };

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
