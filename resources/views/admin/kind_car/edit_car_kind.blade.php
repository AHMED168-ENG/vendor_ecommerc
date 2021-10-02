@extends('admin/dashboard')
@section('title')
edit kind of car
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashpored')}}">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('all_kind_car')}}"> انواع السيارات </a>
                            </li>
                            <li class="breadcrumb-item active">تعديل نوع السياره
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
                                <h4 class="card-title" id="basic-layout-form"> تعديل نوع السياره </h4>
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
                                    <form class="form" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="ft-home"></i> بيانات النوع </h4>
                                        <div class="row all_data">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">  اسم النوع - {{$car_kind->shortcut}}</label>
                                                    <input type="text" id="name"
                                                    class="form-control"
                                                    placeholder="ادخل اسم النوع"
                                                    value = "{{$car_kind->name}}"
                                                    name="car_kind[0][name]">
                                                    @error("car_kind.0.name")
                                                        <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>




                                                <div class="col-md-6 send">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" name="car_kind[0][active]"
                                                        value = 1
                                                        id="active"
                                                        class="switchery" data-color="success"
                                                        {{$car_kind->active  == 1 ? "checked" : ""}}/>
                                                        <label for="active"
                                                        class="card-title ml-1"> الحالة </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="car_kind[0][id]" value={{$car_kind->id}}>
                                                <input type="hidden" name="id" value="2">
                                            </div>
                                            <hr>

                                                @if($other_car_kind)
                                                <ul class="nav nav-tabs">
                                                    @foreach ($other_car_kind as $key => $val)
                                                        <li class="nav-item">
                                                            <a class="nav-link {{$key == 0 ? "active" : ""}}" id="home-tab" data-toggle="tab" href="#home{{$key}}" aria-controls="home"
                                                            aria-expanded="{{$key == 0 ? "true" : "false"}}">{{trans("message." . $val -> shourtcut)}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                                <div class="tab-content px-1 pt-1">
                                                    @foreach ($other_car_kind as $key => $val)
                                                        <div role="tabpanel" class="tab-pane {{$key == 0 ? "active" : ""}}" id="home{{$key}}" aria-labelledby="home-tab" aria-expanded="{{$key == 0 ? "true" : "false"}}">
                                                            <div class="row all_data">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="name">  اسم النوع - {{$val->shourtcut}}</label>
                                                                        <input type="text" id="name"
                                                                            class="form-control"
                                                                            placeholder="ادخل اسم النوع"
                                                                            value = "{{$val -> name}}"
                                                                            name="car_kind[{{$key + 1}}][name]">
                                                                        @error("car_kind." . ( $key + 1) . ".name")
                                                                            <span class="text-danger"> {{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 send">
                                                                    <div class="form-group mt-1">
                                                                        <input type="checkbox" name="car_kind[{{$key + 1}}][active]"
                                                                        value = 1
                                                                        id="active"
                                                                        class="switchery" data-color="success"
                                                                        {{$val->active  == 1 ? "checked" : ""}}/>
                                                                        <label for="active"
                                                                        class="card-title ml-1"> الحالة </label>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="car_kind[{{$key + 1}}][id]" value={{$val->id}}>
                                                                <input type="hidden" name="id" value="2">
                                                            </div>
                                                            <hr>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="car_photo">صوره السياره</label>
                                                    <input type="file" id="car_photo"
                                                    class="form-control"
                                                    placeholder="ادخل صوره السياره"
                                                    name="car_photo">
                                                    @error("car_photo")
                                                        <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <div>
                                                        <img style="width:50%;height:80px" src="{{asset("public/asset/admin/images/products_image/car_photo") . "/" . $car_kind -> car_photo }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="car_photo_old" value="{{$car_kind -> car_photo}}">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="car_logo_photo">لوجو شركه السياره</label>
                                                    <input type="file" id="car_logo_photo"
                                                    class="form-control"
                                                    placeholder="ادخل صوره السياره"
                                                    name="car_logo_photo">
                                                    @error("car_logo_photo")
                                                        <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <div>
                                                        <img style="width:50%;height:80px" src="{{asset("public/asset/admin/images/products_image/car_logo_photo") . "/" . $car_kind -> car_logo_photo }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="car_logo_photo_old" value="{{$car_kind -> car_logo_photo}}">

                                    </div>

                                    @endif

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                            onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> حفظ
                                            </button>
                                        </div>
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

@endsection
