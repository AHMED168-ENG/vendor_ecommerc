       <!-- Start Nav Bar -->
       <div class="custom-nav" style="background:#eee">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{route("home")}}">
                    <img src="{{asset("public/asset/frontEnd/img/logo.svg")}}" alt="0" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto ml-auto">
                        <li class="nav-item">
                            <a class="nav-link {{route("all_product_vindoer") == request() -> url() ? "active" : ""}}" href="{{Route("all_product_vindoer")}}">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{route("all_my_product") == request() -> url() ? "active" : ""}}"  href="{{Route("all_my_product")}}">منتجاتى</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">الطلبات</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">إشعارات</a>
                        </li>

                        <li class="nav-item {{route("show_financial_transactions") == request() -> url() ? "active" : ""}}">
                            <a class="nav-link" href="{{route("show_financial_transactions")}}">المعاملات المالية</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">إحصائيات</a>
                        </li>


                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary" href="#">اتصل بنا</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- End Nav Bar -->
    <!-- Start Section -->
    <div class="section-search">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="left mb-2 mt-2" >
                        <ul class="list-inline" style="margin:0 !important">
                            @if (auth() -> guard("vindoers") -> check())
                            <li class="list-inline-item" style="position: relative;">
                                <div class="dropdown">
                                      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-fw fa-user primary-i"></i>
                                        حسابى
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <p class="dropdown-item user-aria">
                                            <img class="float-left" src="{{asset("public/asset/admin/images/vindoer_image/") . "/" . auth() ->guard("vindoers")-> user()-> shop_img}}" width="49" height="49" />
                                            <span class="float-left ml-2">
                                                {{auth() ->guard("vindoers")-> user()->name}}
                                                <br />
                                                {{auth() ->guard("vindoers")-> user()->email}}
                                            </span>
                                        </p>

                                        <a class="dropdown-item" href="{{route("vindoers_siting")}}"><i class="fa fa-user"></i> اعدادات</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-shopping-bag"></i> طلباتي</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-fw fa-heart"></i> قائمة الرغبات</a>
                                        <a class="dropdown-item" href="#"><i class="far fa-fw fa-envelope"></i> اتصل بنا</a>
                                        <a class="dropdown-item noti" href="#"><i class="far fa-fw fa-bell"></i> إشعارات <span>80</span></a>


                                        <form id="logout-form" action="{{route('logout_vindoers')}}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item"><i class="fas fa-fw fa-sign-out-alt"></i> تسجيل خروج</button>
                                        </form>
                                      </div>
                                </div>
                            </li>
                            @else
                                <li class="list-inline-item mb-2 mt-2" >
                                    <a style="color:white" href="{{Route("home")}}">
                                        <i class="fa fa-fw fa-user primary-i"></i>
                                        حسابى
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section -->
