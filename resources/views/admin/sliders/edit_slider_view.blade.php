@extends('admin/dashboard')
@section('title')
Edit Sliders
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
                            <li class="breadcrumb-item"><a href="{{route('all_sliders')}}"> الاسليدرس</a>
                            </li>
                            <li class="breadcrumb-item active">تعديل اسليدرس
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
                                <h4 class="card-title" id="basic-layout-form"> تعديل اسليدرس </h4>
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
                                        <h4 class="form-section"><i class="ft-home"></i> بيانات الاسليدرس </h4>
                                        <div class="row all_data">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">  عنوان الاسليدرس - {{$slider->shourtcut}}</label>
                                                    <input autofocus type="text" id="title"
                                                    class="form-control"
                                                    placeholder="ادخل عنوان الاسليدرس"
                                                    value = "{{$slider -> title}}"
                                                    name="sliders[0][title]">
                                                    @error("sliders.0.title")
                                                        <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="info">  بيانات الاسليدرس - {{$slider->shourtcut}}</label>
                                                    <textarea autofocus type="text" id="info"
                                                    class="form-control"
                                                    placeholder="ادخل بيانات الاسليدرس"
                                                    name="sliders[0][info]">{{$slider -> info}}</textarea>
                                                    @error("sliders.0.info")
                                                        <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="page"> صفحه الاسليدرس {{$slider->shourtcut}}</label>
                                                    <select name="sliders[{{0}}][page]" class="select2 form-control">
                                                        <optgroup label="من فضلك أختر الصفحه التي تريد جعل الاسليدر بها ">
                                                            <option value=""></option>
                                                        </optgroup>
                                                    </select>
                                                    @error("sliders.0.page")
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mt-1">
                                                    <input type="checkbox" name="sliders[0][active]"
                                                    value = 1
                                                    id="active"
                                                    class="switchery" data-color="success"
                                                            {{$slider -> active  == 1 ? "checked" : ""}}/>
                                                        <label for="active"
                                                            class="card-title ml-1"> الحالة </label>
                                                        </div>
                                            </div>
                                            <input type="hidden" name="sliders[0][id]" value={{$slider -> id}}>
                                        </div>
                                        <hr>

                                        @if($other_lang_slider)
                                        <ul class="nav nav-tabs">
                                            @foreach ($other_lang_slider as $key => $val)
                                                <li class="nav-item">
                                                    <a class="nav-link {{$key == 0 ? "active" : ""}}" id="home-tab" data-toggle="tab" href="#home{{$key}}" aria-controls="home"
                                                    aria-expanded="{{$key == 0 ? "true" : "false"}}">{{trans("message." . $val -> shourtcut)}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content px-1 pt-1">
                                            @foreach ($other_lang_slider as $key => $val)
                                                <div role="tabpanel" class="tab-pane {{$key == 0 ? "active" : ""}}" id="home{{$key}}" aria-labelledby="home-tab" aria-expanded="{{$key == 0 ? "true" : "false"}}">
                                                    <div class="row all_data">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title">  عنوان الاسليدرس - {{$val->shourtcut}}</label>
                                                                <input autofocus type="text" id="title"
                                                                class="form-control"
                                                                placeholder="ادخل عنوان الاسليدرس"
                                                                value = "{{$val -> title}}"
                                                                name="sliders[{{$key + 1}}][title]">
                                                                @error("sliders." . ($key + 1) . ".title")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="info">  بيانات الاسليدرس - {{$val->shourtcut}}</label>
                                                                <textarea autofocus type="text" id="info"
                                                                class="form-control"
                                                                placeholder="ادخل بيانات الاسليدرس"
                                                                name="sliders[{{$key + 1}}][info]">{{$val -> info}}</textarea>
                                                                @error("sliders." . ($key + 1) . ".info")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="page"> صفحه الاسليدرس {{$val->shourtcut}}</label>
                                                                <select name="sliders[{{$key + 1}}][page]" class="select2 form-control">
                                                                    <optgroup label="من فضلك أختر الصفحه التي تريد جعل الاسليدر بها ">
                                                                        <option value=""></option>
                                                                    </optgroup>
                                                                </select>
                                                                @error("sliders." . ($key + 1) . ".page")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group mt-1">
                                                                <input type="checkbox" name="sliders[{{$key + 1}}][active]"
                                                                value = 1
                                                                id="active"
                                                                class="switchery" data-color="success"
                                                                        {{$val -> active  == "1" ? "checked" : ""}}/>
                                                                    <label for="active"
                                                                        class="card-title ml-1"> الحالة </label>
                                                                    </div>
                                                        </div>
                                                        <input type="hidden" name="sliders[{{$key + 1}}][id]" value={{$val->id}}>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        @endif



                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="slider_photo">صوره الاسليدر</label>
                                                <input type="file" id="slider_photo"
                                                class="form-control"
                                                placeholder="ادخل صوره الاسليدر"
                                                name="slider_photo">
                                                @error("slider_photo")
                                                    <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex">
                                                <div class="col-4">
                                                    <div>
                                                        <img style="width:100%;height:100px" src="{{asset("public/asset/admin/images/sliders_photo") . "/" . $slider -> img }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="hidden_img" value={{$slider -> img}}>

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
