@extends('frontEnd/vindoers/vindoer_home')

@section('content')
        <!-- ////////////////////////// sign in ////////////////////////// -->
        <div class="signin">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <div class="right p-4 mb-3">

                            <h4>مرحبا بعودتك!</h4>
                            <br /> <br />

                            <form method="post" action="">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">الجوال <span class="text-danger">*</span></label>
                                    <input required name="phone" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group pass_show">
                                    <label for="PASS">كلمة المرور <span class="text-danger">*</span></label>
                                    <input required name="password" type="password" class="form-control" id="PASS">
                                </div>

                                <div class="form-group form-check">
                                    <input name="rememper_me" type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label  class="form-check-label" for="exampleCheck1">تذكرنى</label>
                                </div>
                                <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
                            </form>

                            <p class="mb-0 mt-2">
                                ليس لديك حساب؟ <a href="{{route("regist_vindoer")}}">سجل هنا</a>
                            </p>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="left">
                            <img src="{{asset("public/asset/frontEnd/img/login.svg")}}" class="img-fluid" alt="0" />
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- ////////////////////////// login in ////////////////////////// -->
@endsection

