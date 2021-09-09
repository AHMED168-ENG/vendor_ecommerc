
        <!-- Start Nav Bar -->
        <div class="custom-nav">
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
                            <li class="nav-item {{Route("home") == request() -> url()  ? "active" : ""}}">
                                <a class="nav-link" href="{{route("home")}}">الرئيسية</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">الأجزاء الميكانيكية</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">قطع كهربائية</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">الجسم</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">اكسسوارات</a>
                            </li>


                        </ul>

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary" href="{{route("regist_vindoer")}}">{{auth()->guard("vindoers")->check() ? "بيع معنا" : "انشا متجرك"}}</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Nav Bar -->
