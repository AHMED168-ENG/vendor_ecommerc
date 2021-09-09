@extends('admin/dashboard')
@section('title')
add new models
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
                            <li class="breadcrumb-item"><a href="{{route('all_model_car')}}"> موديلات السيارات </a>
                            </li>
                            <li class="breadcrumb-item active">اضافه موديل السياره
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
                                <h4 class="card-title" id="basic-layout-form"> إضافة موديل السياره </h4>
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
                                            <div class="row all_data">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="model"> اسم الموديل</label>
                                                        <input autofocus type="numper" id="model"
                                                        class="form-control"
                                                        placeholder="ادخل اسم الموديل"
                                                        value="{{old("model")}}"
                                                        name="model">
                                                        @error("model")
                                                            <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" name="active"
                                                        value = 1
                                                        checked
                                                        id="active"
                                                        class="switchery" data-color="success"
                                                            {{old("active")  == 1 ? "checked" : ""}}/>
                                                        <label for="active"
                                                            class="card-title ml-1"> الحالة </label>
                                                        </div>
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
