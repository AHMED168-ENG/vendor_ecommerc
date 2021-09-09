@extends('admin/dashboard')
@section('title')
edit vindoer
@endsection
@section('content')
{{session("error")}}
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashpored')}}">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('all_vindoer')}}"> التجار </a>
                            </li>
                            <li class="breadcrumb-item active">تعديل التاجر - {{$vindor -> name}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> تعديل تاجر </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @if(session() -> has("message"))
                            <div class="text-center btn-lg btn btn-outline-{{session("type")}}">{{session()->get("message")}}</div>
                            @endif
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{route("update_vindoer" , $vindor -> id)}}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> بيانات التاجر </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">  اسم التاجر بالكامل- {{__("message." . git_default_language())}}</label>
                                                            <input type="text" id="name"
                                                                class="form-control"
                                                                placeholder="ادخل اسم التاجر"
                                                                value = "{{$vindor -> name}}"
                                                                name="name">
                                                            @error("name")
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="catigory"> اسم المتجر الخاص بك - {{__("message." . git_default_language())}} </label>
                                                            <input  class="form-control" name="shop_name" value="{{$vindor -> shop_name}}" type="text" placeholder="ادخل اسم المتجر الخاص بك">
                                                            @error('shop_name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="check_if_admin_enter_or_no" value="123">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Commercial_Register"> السجل التجاري </label>
                                                            <input type="file" id="Commercial_Register"
                                                                class="form-control"
                                                                placeholder="ادخل صوره القسم"
                                                                name="Commercial_Register">
                                                            @error("Commercial_Register")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="hidden_Commercial_Register" value="{{$vindor -> Commercial_Register}}">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">  ايميل التاجر - {{__("message." . git_default_language())}}</label>
                                                            <input type="text" id="email"
                                                                class="form-control"
                                                                placeholder="ادخل ايميل القسم  "
                                                                name="email"
                                                                value="{{$vindor -> email}}">
                                                            @error("email")
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password">  الرقم السري الجديد اذا كنت تريد</label>
                                                            <input type="password" id="password"
                                                                class="form-control"
                                                                placeholder="الرقم السري الجديد اذا كنت تريد"
                                                                name="password">
                                                            @error("password")
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="age">العمر - {{__("message." . git_default_language())}}</label>
                                                            <input type="number" id="age"
                                                                class="form-control"
                                                                min="15"
                                                                placeholder="ادخل عمر التاجر"
                                                                name="age"
                                                                value="{{$vindor -> age}}">
                                                            @error("age")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="addres">  العنوان بالبلد مفصول ب فصله - {{__("message." . git_default_language())}}</label>
                                                            <input type="text" id="addres"
                                                                class="form-control"
                                                                placeholder="ادخل عنوان التاجر"
                                                                name="addres"
                                                                value="{{$vindor -> addres}}">
                                                            @error("addres")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mobil">الموبايل - {{__("message." . git_default_language())}}</label>
                                                            <input type="text" id="mobil"
                                                                class="form-control"
                                                                placeholder="ادخل موبيل التاجر"
                                                                name="mobil"
                                                                value="{{$vindor -> mobil}}">
                                                            @error("mobil")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox"
                                                            name="active"
                                                            id="active"
                                                            class="switchery"
                                                            data-color="success"
                                                            value = "1"
                                                            {{ $vindor->active == 1 ? "checked" : ""}}
                                                            >
                                                            @error("active")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                            <label for="active"
                                                            class="card-title ml-1"> الحالة</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="shop_img"> صوره المتجر </label>
                                                        <input type="file" id="shop_img"
                                                            class="form-control"
                                                            placeholder="ادخل صوره المتجر"
                                                            name="shop_img">
                                                        @error("shop_img")
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group" style="width:100px; height:100px">
                                                        <img style="width:100%;height:100%" src="{{asset("public/asset/admin/images/vindoer_image/" . $vindor->shop_img)}}" >
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1"
                                                            onclick="history.back();">
                                                        <i class="ft-x"></i> تراجع
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> حفظ
                                                    </button>
                                                </div>
                                                <input type="hidden" name="password2" value="{{$vindor -> password}}">
                                                <input type="hidden" name="hidden_photo" value="{{$vindor -> shop_img}}">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>

