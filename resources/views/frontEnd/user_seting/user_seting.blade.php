@extends('frontEnd/index')

@section('content')
        <!-- //////////////////////////////////////////////////// -->
        <div class="trader-account">

            <div class="head">

                <div class="content">
                    <div class="container">

                        <div>

                            <p class="personal_photo">
                                <img src="{{$user_data == null ? asset("public\asset\admin\images\users_photo\images.jpg") :  asset("public\asset\admin\images\users_photo") . "/" . $user_data->user_photo}}" />
                            </p>
                            <h6>{{$user_data -> f_name . " " . $user_data -> l_name}}</h6>
                            <p>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{$user_data -> addres}}</span>
                            </p>
                        </div>

                    </div>

                </div>
            </div>



            <div class="page pt-5">
                <div class="container">


                    <div class="row">
                            <div class="col-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link {{!session() -> has("message") && !session() -> has("password") && !session() -> has("email") ? "active" : ""}}" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">معلومات الحساب</a>
                                    <a class="nav-link {{session() -> has("message") ? "active" : ""}}" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">تعديل الحساب</a>
                                    <a class="nav-link {{session() -> has("password") || session() -> has("email")  ? "active" : ""}}" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">أمان الحساب</a>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade {{!session() -> has("message") && !session() -> has("password") && !session() -> has("email") ? "active show" : ""}}" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                                        <form>
                                            <div class="form-group">
                                                <label for="storeName">الاسم الاول</label>
                                                <input disabled type="text" class="form-control" id="storeName" value="{{$user_data -> f_name}}" />
                                            </div>

                                            <div class="form-group">
                                                <label for="storeName">الاسم الثاني</label>
                                                <input disabled type="text" class="form-control" id="storeName" value="{{$user_data -> l_name}}" />
                                            </div>

                                            <div class="form-group">
                                                <label for="The-name">العنوان</label>
                                                <input disabled type="text" class="form-control" id="The-name" value="{{$user_data -> addres}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="email">الايميل</label>
                                                <input disabled type="email" class="form-control" id="email" value="{{$user_data -> email}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="phone">رقم الجوال</label>
                                                <input disabled type="number" class="form-control" id="phone" value="{{$user_data -> phone}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="location">العمر</label>
                                                <input disabled type="numper" class="form-control" id="location" value="{{$user_data -> age}}">
                                            </div>
                                        </form>
                                </div>

                                    <div class="tab-pane fade {{session() -> has("message") ? "active show" : ""}}" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile">
                                        @if (session() -> has("message"))
                                        <div class="alert alert-{{session("type")}}">{{session("message")}}</div>
                                        @endif
                                            <form enctype="multipart/form-data" class="edit_data" method="post" action="{{route("update_user_seting" , $user_data -> id)}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="storeName">الاسم الاول</label>
                                                    <input type="text" class="form-control" name="f_name" id="storeName" value="{{$user_data -> f_name}}" />
                                                    @error('f_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="storeName">الاسم الثاني</label>
                                                    <input name="l_name" type="text" class="form-control" id="storeName" value="{{$user_data -> l_name}}" />
                                                    @error('l_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="The-name">العنوان</label>
                                                    <input name="addres" type="text" class="form-control" id="The-name" value="{{$user_data -> addres}}">
                                                    @error('addres')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                <label for="email">الايميل</label>
                                                <input name="email" type="email" class="form-control" id="email" value="{{$user_data -> email}}">
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                </div>

                                            <div class="form-group">
                                                <label for="phone">رقم الجوال</label>
                                                <input name="phone" type="number" class="form-control" id="phone" value="{{$user_data -> phone}}">
                                                @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="location">العمر</label>
                                                <input name="age" type="numper" class="form-control" id="location" value="{{$user_data -> age}}">
                                                @error('age')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="location">الصوره الشخصيه</label>
                                                <input name="user_photo" type="file" class="form-control" id="location">
                                            </div>
                                            <input type="hidden" value="{{$user_data -> user_photo}}" name="hidden_photo" >
                                            <div class="form-group text-center">
                                                <button class="btn-primary btn">حفظ</button>
                                            </div>
                                        </form>
                                </div>

                                <div class="tab-pane fade {{session() -> has("password") || session() -> has("email") ? "active show" : ""}}" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                    <form>
                                        <label>الايميل</label>
                                        <input type="email" class="form-control" />
                                        <span class="text-denger">{{session("email")}}</span>
                                        <br />
                                        <label>كلمة المرور القديمة</label>
                                        <input type="password" class="form-control" />
                                        <span class="text-denger">{{session("password")}}</span>
                                        <br />

                                        <label>كلمة السر الجديدة</label>
                                        <input type="new_password" class="form-control" />
                                        <br />

                                    <div class="text-center">
                                        <button class="btn btn-primary">تغيير كلمة المرور</button>
                                    </div>
                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Container -->
            </div>
        </div>

        <br />
        <br />


        <div class="modal fade" id="Change-password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تغيير كلمة المرور</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <style>
            label {
                font-style: italic
            }
            .edit_data input {
                background:#eee;
            }
        </style>
@endsection
