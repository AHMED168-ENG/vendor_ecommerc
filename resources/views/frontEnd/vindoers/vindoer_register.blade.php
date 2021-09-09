@extends('frontEnd/vindoers/vindoer_home')

@section('content')
<div class="signin">
    <div class="container">
        @if (session() -> has("message"))
            <div class="alert alert-{{session("type")}}">{{session("message")}}</div>
        @endif
        <div class="row">

            <div class="col-md-6">
                <div class="right p-4 mb-3">

                    <h4>مرحبا بك فى <span class="main-color">Zone</span></h4>
                    <br /> <br />

                    <form action="{{route("store_vindoer_from_user_regist")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">إسمك <span class="text-danger">*</span></label>
                            <input type="text" value="{{old("name")}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                            @error("name")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم المتجر <span class="text-danger">*</span></label>
                            <input type="text" value="{{old("shop_name")}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="shop_name">
                            @error("shop_name")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>السجل التجاري <span class="text-danger">*</span></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="Commercial_Register" />
                                <label class="custom-file-label" for="customFile">اختيار ملف</label>
                            </div>
                            @error('Commercial_Register')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label><span class="text-danger">*</span>صوره المتجر</label>
                            <div class="custom-file">
                                <label style="opacity:0.9" class="custom-file-label" for="customFile">ادخل الملف</label>
                                <input type="file" class="custom-file-input" id="customFile" name="shop_img" />
                            </div>
                            @error('shop_img')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Email">البريد الالكترونى <span class="text-danger">*</span></label>
                            <input value="{{old("email")}}" type="email" class="form-control" id="Email" name="email">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="age">العمر <span class="text-danger">*</span></label>
                            <input value="{{old("age")}}" type="age" class="form-control" id="age" name="age">
                            @error('age')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mobil">رقم الجوال <span class="text-danger">*</span></label>
                            <input value="{{old("mobil")}}" type="number" class="form-control" id="mobil" name="mobil">
                            @error('mobil')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group pass_show">
                            <label for="PASS">الرقم السري <span class="text-danger">*</span></label>
                            <input value="{{old("password")}}" type="password" class="form-control" id="PASS" name="password">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="location">عنوانك على الخريطة <span class="text-danger">*</span></label>
                            <input value="{{old("addres")}}" type="text" class="form-control" id="location" data-toggle="modal" data-target="#exampleModal" name="addres" />
                            @error('addres')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1"
                            name="accept_ruls" checked>
                            <label value="{{old("accept_ruls")}}" class="form-check-label" for="exampleCheck1">وافق على الشروط والأحكام</label>
                            @error("accept_ruls")
                                <span class="d-block text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">تسجيل</button>
                        <button type="button" class="btn btn-warning mr-1"
                                onclick="history.back();">
                            <i class="ft-x"></i> تراجع
                        </button>
                    </form>

                    <p class="mb-0 mt-2">
                        إذا كان لديك حساب بالفعل؟ <a href="{{route("login_vindoer")}}">تسجيل الدخول هنا</a>
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
@endsection

