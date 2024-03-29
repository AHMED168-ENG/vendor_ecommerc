@extends('admin/dashboard')
@section("title")
edit language
@endsection

@section ("content")

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashpored')}}">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('all_lang')}}"> أللغات </a>
                            </li>
                            <li class="breadcrumb-item active">تعديل لغة
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> تعديل لغة </h4>
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
                                <div class="text-center btn btn-lg btn-outline-{{session("type")}}">{{session()->get("message")}}</div>
                            @endif
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{route('save_language' , $language -> id)}}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> تعديل لغه </h4>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اسم اللغة </label>
                                                        <input type="text" value="{{$language -> name}}" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل اسم اللغة  "
                                                               name="name">
                                                        @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> الاختصار </label>
                                                        <input type="text" value="{{$language -> shourtcut}}" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل اختصار اللغة"
                                                               name="shourtcut">
                                                        @error('shourtcut')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row" >

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2"> الاتجاة </label>
                                                        <select name="direction" class="select2 form-control">
                                                            <optgroup label="من فضلك أختر اتجاه اللغة ">
                                                                <option value="ltr" {{$language -> direction  == "ltr" ? "selected" : ""}} >من اليسار الي اليمين</option>
                                                                <option value="rtl" {{$language -> direction  == "rtl" ? "selected" : ""}}>من اليمين الي اليسار</option>
                                                            </optgroup>
                                                        </select>
                                                        @error('direction')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" value="1" {{$language -> active == "1" ? "checked" : ""}} name="active"
                                                               id="switcheryColor4"
                                                               class="switchery" data-color="success"
                                                               />
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">الحالة </label>
                                                    </div>
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
