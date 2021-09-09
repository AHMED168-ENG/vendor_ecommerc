@extends('frontEnd/vindoers/vindoer_home')

@section('content')
 <!-- //////////////////////////////////////////////////// -->
 <div class="trader-account">

    <div class="head">

        <div class="content">
            <div class="container">

                <div>

                    <p><img src="{{asset("public/asset/admin/images/vindoer_image") . "/" . $vindoer_data ->shop_img}}" /></p>
                    <h6>{{$vindoer_data -> shop_name}}</h6>
                    <p>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>السعودية - الرياض</span>
                    </p>

                    <p>
                        <i class="far fa-star"></i>
                        <span>3.89</span> <br />
                        <span>قيم 536 شخصًا</span>
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
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">تفاصيل الحساب</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">التخصص</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">اوقات العمل</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">أمان الحساب</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">


                                <!-- <h4 class="text-right"><a href="#"><i class="fa fa-edit"></i></a></h4> -->

                                <form>
                                    <div class="form-group">
                                        <label for="storeName">اسم المتجر</label>
                                        <input type="text" class="form-control" id="storeName" value="{{$vindoer_data -> shop_name}}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="The-name">اسم صاحب المتجر</label>
                                        <input type="text" class="form-control" id="The-name" value="{{$vindoer_data -> name}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">ايميل صاحب المتجر</label>
                                        <input type="email" class="form-control" id="email" value="{{$vindoer_data -> email}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">رقم الجوال</label>
                                        <input type="number" class="form-control" id="phone" value="{{$vindoer_data -> mobil}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="location">العنوان</label>
                                        <input type="text" class="form-control" id="location" value="{{$vindoer_data -> addres}}">
                                    </div>

                                    <div class="form-group text-center">
                                        <button class="btn-primary btn">حفظ</button>
                                    </div>



                                </form>

                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                                <div class="text-center">
                                    <span class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">إضافة تخصص</span>
                                </div>

                                <br />

                                <div class="accordion" id="accordionExample">

                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    هيونداي
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>Hyundai elantra</p>
                                                <p>Hyundai sonata</p>
                                                <p>Hyundai tucson</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Audi
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>Hyundai elantra</p>
                                                <p>Hyundai sonata</p>
                                                <p>Hyundai tucson</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                BMW
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>Hyundai elantra</p>
                                                <p>Hyundai sonata</p>
                                                <p>Hyundai tucson</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--  -->

                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                                <div class="mb-4">
                                    <h6>
                                    <input type="checkbox" />
                                        السبت
                                        <span class="float-right" dir="ltr">

                                            <span>
                                                <input type="text" style="width:60px;text-align:center;" value="8.00" /> PM
                                            </span>
                                            <span class="mr-4">
                                                <input type="text" style="width:60px;text-align:center;" value="8.00" /> AM
                                            </span>

                                        </span>
                                    </h6>
                                </div>

                                <div class="mb-4">
                                    <h6>
                                    <input type="checkbox" />
                                        الاحد
                                        <span class="float-right" dir="ltr">

                                            <span>
                                                <input type="text" style="width:60px;text-align:center;" value="8.00" /> PM
                                            </span>
                                            <span class="mr-4">
                                                <input type="text" style="width:60px;text-align:center;" value="8.00" /> AM
                                            </span>

                                        </span>
                                    </h6>
                                </div>

                                <div class="mb-4">
                                    <h6>
                                    <input type="checkbox" />
                                        الاثنين
                                        <span class="float-right" dir="ltr">

                                            <span>
                                                <input type="text" style="width:60px;text-align:center;" value="8.00" /> PM
                                            </span>
                                            <span class="mr-4">
                                                <input type="text" style="width:60px;text-align:center;" value="8.00" /> AM
                                            </span>

                                        </span>
                                    </h6>
                                </div>

                                <div class="mb-4">
                                    <h6>
                                    <input type="checkbox" />
                                        الثلاثاء
                                        <span class="float-right" dir="ltr">

                                            <span>
                                                <input type="text" style="width:60px;text-align:center;" value="8.00" /> PM
                                            </span>
                                            <span class="mr-4">
                                                <input type="text" style="width:60px;text-align:center;" value="8.00" /> AM
                                            </span>

                                        </span>
                                    </h6>
                                </div>

                                <div class="mb-4">
                                    <h6>
                                    <input type="checkbox" />
                                        الاربعاء
                                        <span class="float-right" dir="ltr">

                                            <span>
                                                <input type="text" style="width:60px;text-align:center;" value="8.00" /> PM
                                            </span>
                                            <span class="mr-4">
                                                <input type="text" style="width:60px;text-align:center;" value="8.00" /> AM
                                            </span>

                                        </span>
                                    </h6>
                                </div>

                                <div class="mb-4">
                                    <h6>
                                    <input type="checkbox" />
                                        الخميس
                                        <span class="float-right" dir="ltr">

                                            <span>
                                                <input type="text" style="width:60px;text-align:center;" value="8.00" /> PM
                                            </span>
                                            <span class="mr-4">
                                                <input type="text" style="width:60px;text-align:center;" value="8.00" /> AM
                                            </span>

                                        </span>
                                    </h6>
                                </div>

                                <div class="mb-4">
                                    <h6>
                                    <input type="checkbox" />
                                        الجمعة
                                        <span class="float-right" dir="ltr">

                                            <span>
                                                <input type="text" style="width:60px;text-align:center;" value="8.00" /> PM
                                            </span>
                                            <span class="mr-4">
                                                <input type="text" style="width:60px;text-align:center;" value="8.00" /> AM
                                            </span>

                                        </span>
                                    </h6>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                                <form>
                                    <label>كلمة المرور</label>
                                    <input type="password" class="form-control" />
                                    <br />

                                    <div class="text-center">
                                        <span class="btn btn-primary" data-toggle="modal" data-target="#Change-password">تغيير كلمة المرور</span>
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
<br />
<br />
<br />
<br />
<br />


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة تخصص</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    <label>نوع السيارة</label>
                    <select class="form-control">
                        <option>Hyundai</option>
                    </select>

                    <br />

                    <label>طراز السيارة</label>
                    <select class="form-control">
                        <option>Hyundai elantra</option>
                    </select>

                    <br />

                    <div class="text-center">
                        <button class="btn btn-primary">حفظ</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Change-password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تغيير كلمة المرور</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    <label>كلمة المرور القديمة</label>
                    <input type="password" class="form-control" />
                    <br />

                    <label>كلمة السر الجديدة</label>
                    <input type="password" class="form-control" />
                    <br />


                    <label>تأكيد كلمة المرور</label>
                    <input type="password" class="form-control" />
                    <br />

                    <div class="text-center">
                        <button class="btn btn-primary">حفظ</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
