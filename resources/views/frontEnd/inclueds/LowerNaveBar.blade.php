
<div class="section-search">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="right mt-3">
                    <form action="" method="">
                       <div class="row">

                            <div class="col-md-5 mb-3">
                                <select id="inputState" class="form-control">
                                    <option selected>أضف مركبتك</option>
                                    <option>...</option>
                                </select>
                            </div>

                            <div class="col-md-7 mb-3">
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="ما الأجزاء التي تبحث عنها؟" id="in-sea" />
                                  <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                                  </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="left mb-3 mt-3">
                    <ul class="list-inline">

                        <li class="list-inline-item" style="position: relative;">
                            <div class="dropdown">
                                  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-user primary-i"></i>
                                    حسابى
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                    <p class="dropdown-item user-aria">
                                        <img class="float-left" src="{{asset("public/asset/frontEnd/img/user.svg")}}" width="49" height="49" />
                                        <span class="float-left ml-2">
                                            عبدالرحمن محمد
                                            <br />
                                            info@gmail.com
                                        </span>
                                    </p>

                                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> اعدادات</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-shopping-bag"></i> طلباتي</a>
                                    <a class="dropdown-item" href="#"><i class="far fa-fw fa-heart"></i> قائمة الرغبات</a>
                                    <a class="dropdown-item" href="#"><i class="far fa-fw fa-envelope"></i> اتصل بنا</a>
                                    <a class="dropdown-item noti" href="#"><i class="far fa-fw fa-bell"></i> إشعارات <span>80</span></a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item" href="{{route("logout")}}"><i class="fas fa-fw fa-sign-out-alt"></i> تسجيل خروج</button>
                                    </form>
                                  </div>
                            </div>
                        </li>

                        <li class="list-inline-item">
                            <span id="btn-cart"><i class="fas fa-fw fa-shopping-cart primary-i"></i> عربة التسوق</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- Start Section Cart -->
            <div class="section-cart">
                <div class="col-md-7 m-0 p-0">
                    <div class="cart-container p-3">
                        <h3>
                            عربة التسوق
                            <span class="float-right close-section-cart"><i class="fas fa-times"></i></span>
                        </h3>

                        <br />

                        <div class="row">
                            <div class="col-lg-3 text-center pro-img">
                                <img src="{{asset("public/asset/frontEnd/img/pro/pro1.svg")}}" width="112" height="116" />
                            </div>
                            <div class="col-lg-5">
                                <h4>اسم المنتج يكتب هنا</h4>
                                <p dir="lrt">
                                    <span class="price mr-3">4000 ريال</span>
                                    <span class="old-price">5000 ريال</span>
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group mt-4 pb-3">

                                    <span class="input-group-btn">
                                        <button style="border-radius:0" class="quantity-right-plus btn btn-secondary btn-number" data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus">+</span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button style="border-radius:0" class="quantity-left-minus btn btn-secondary btn-number"  data-type="minus" data-field="">
                                          <span class="glyphicon glyphicon-minus">-</span>
                                        </button>
                                    </span>


                                    <span class="input-group-btn">
                                        <button style="border-radius:0" class="btn btn-danger ml-3 cart-del-item">
                                          <span><i class="far fa-trash-alt"></i></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 text-center pro-img">
                                <img src="{{asset("public/asset/frontEnd/img/pro/pro2.svg")}}" width="112" height="116" />
                            </div>
                            <div class="col-lg-5">
                                <h4>اسم المنتج يكتب هنا</h4>
                                <p dir="lrt">
                                    <span class="price mr-3">4000 ريال</span>
                                    <span class="old-price">5000 ريال</span>
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group mt-4 pb-3">

                                    <span class="input-group-btn">
                                        <button style="border-radius:0" class="quantity-right-plus btn btn-secondary btn-number" data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus">+</span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button style="border-radius:0" class="quantity-left-minus btn btn-secondary btn-number"  data-type="minus" data-field="">
                                          <span class="glyphicon glyphicon-minus">-</span>
                                        </button>
                                    </span>


                                    <span class="input-group-btn">
                                        <button style="border-radius:0" class="btn btn-danger ml-3 cart-del-item">
                                          <span><i class="far fa-trash-alt"></i></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 text-center pro-img">
                                <img src="{{asset("public/asset/frontEnd/img/pro/pro1.svg")}}" width="112" height="116" />
                            </div>
                            <div class="col-lg-5">
                                <h4>اسم المنتج يكتب هنا</h4>
                                <p dir="lrt">
                                    <span class="price mr-3">4000 ريال</span>
                                    <span class="old-price">5000 ريال</span>
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group mt-4 pb-3">

                                    <span class="input-group-btn">
                                        <button style="border-radius:0" class="quantity-right-plus btn btn-secondary btn-number" data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus">+</span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button style="border-radius:0" class="quantity-left-minus btn btn-secondary btn-number"  data-type="minus" data-field="">
                                          <span class="glyphicon glyphicon-minus">-</span>
                                        </button>
                                    </span>


                                    <span class="input-group-btn">
                                        <button style="border-radius:0" class="btn btn-danger ml-3 cart-del-item">
                                          <span><i class="far fa-trash-alt"></i></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 text-center pro-img">
                                <img src="{{asset("public/asset/frontEnd/img/pro/pro2.svg")}}" width="112" height="116" />
                            </div>
                            <div class="col-lg-5">
                                <h4>اسم المنتج يكتب هنا</h4>
                                <p dir="lrt">
                                    <span class="price mr-3">4000 ريال</span>
                                    <span class="old-price">5000 ريال</span>
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group mt-4 pb-3">

                                    <span class="input-group-btn">
                                        <button style="border-radius:0" class="quantity-right-plus btn btn-secondary btn-number" data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus">+</span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button style="border-radius:0" class="quantity-left-minus btn btn-secondary btn-number"  data-type="minus" data-field="">
                                          <span class="glyphicon glyphicon-minus">-</span>
                                        </button>
                                    </span>


                                    <span class="input-group-btn">
                                        <button style="border-radius:0" class="btn btn-danger ml-3 cart-del-item">
                                          <span><i class="far fa-trash-alt"></i></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>


                        <div class="order-de">
                            <p>المجموع الفرعي <span class="float-right">455 ريال</span></p>
                            <p>ضريبة <span class="float-right">55 ريال</span></p>
                            <p>الشحن <span class="float-right">35 ريال</span></p>
                            <p>السعر الإجمالي <span class="float-right">455 ريال</span></p>
                        </div>

                        <div class="text-center mt-3">
                            <a href="#" class="btn btn-primary pr-5 pl-5">الدفع</a>
                        </div>

                    </div>
                 </div>
            </div>
            <!-- End Section Cart -->
