@extends('admin/dashboard')
@section('title')
Add Sliders
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
                            <li class="breadcrumb-item active">اضافه اسليدرس جديد
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
                                <h4 class="card-title" id="basic-layout-form"> إضافة اسليدرس </h4>
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
                                        @foreach (show_active_language() as $i => $lang )
                                        <div class="row all_data">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">  عنوان الاسليدرس - {{$lang->name}}</label>
                                                    <input autofocus type="text" id="title"
                                                    class="form-control"
                                                    placeholder="ادخل عنوان الاسليدرس"
                                                    value = "{{old("sliders.$i.title")}}"
                                                    name="sliders[{{$i}}][title]">
                                                    @error("sliders.$i.title")
                                                        <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="info">  بيانات الاسليدرس - {{$lang->name}}</label>
                                                    <textarea autofocus type="text" id="info"
                                                    class="form-control"
                                                    placeholder="ادخل بيانات الاسليدرس"
                                                    name="sliders[{{$i}}][info]">{{old("sliders.$i.info")}}</textarea>
                                                    @error("sliders.$i.info")
                                                        <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="page"> صفحه الاسليدرس {{$lang->name}}</label>
                                                    <select name="sliders[{{$i}}][page]" class="select2 form-control">
                                                        <optgroup label="من فضلك أختر الصفحه التي تريد جعل الاسليدر بها ">
                                                            <option value=""></option>
                                                        </optgroup>
                                                    </select>
                                                    @error("sliders.$i.page")
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mt-1">
                                                    <input type="checkbox" name="sliders[{{$i}}][active]"
                                                    value = 1
                                                    id="active"
                                                    checked
                                                    class="switchery" data-color="success"
                                                            {{old("sliders.$i.active")  == 1 ? "checked" : ""}}/>
                                                        <label for="active"
                                                            class="card-title ml-1"> الحالة </label>
                                                        </div>
                                            </div>
                                            <input type="hidden" name="sliders[{{$i}}][shourtcut]" value={{$lang->shourtcut}}>
                                        </div>
                                        <hr>
                                        @endforeach

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="slider_photo">صوره السياره</label>
                                                <input type="file" id="slider_photo"
                                                class="form-control"
                                                placeholder="ادخل صوره السياره"
                                                name="slider_photo">
                                                @error("slider_photo")
                                                    <span class="text-danger"> {{$message}}</span>
                                                @enderror
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
