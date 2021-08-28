@extends('admin/dashboard')
@section('title')
edit main_catigory
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
                            <li class="breadcrumb-item"><a href="{{route('all_catigory')}}"> الاقسام </a>
                            </li>
                            <li class="breadcrumb-item"> تعديل القسم  {{$data -> name}}
                            </li>
                            <li class="breadcrumb-item active">
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
                                <h4 class="card-title" id="basic-layout-form"> تعديل القسم </h4>
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
                                    <form class="form" action="{{route("save_catigory" , $data -> id)}}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> بيانات القسم </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">  اسم القسم - {{$data->shourtcut}}</label>
                                                        <input type="text" id="name"
                                                            class="form-control"
                                                            placeholder="ادخل اسم القسم"
                                                            value = "{{$data -> name}}"
                                                            name="catigory[0][name]">
                                                        @error("catigory.0.name")
                                                            <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="description">  وصف القسم - {{$data ->shourtcut}}</label>
                                                        <textarea type="text" id="description"
                                                            class="form-control"
                                                            autocomplete="description"
                                                            placeholder="ادخل وصف القسم  "
                                                            name="catigory[0][description]">{{$data -> description}}</textarea>
                                                        @error("catigory.0.description")
                                                            <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="slug">  الشعار - {{$data -> shourtcut}}</label>
                                                        <input type="text" id="slug"
                                                        class="form-control"
                                                        placeholder="ادخل شعار القسم"
                                                        value = "{{$data -> slug}}"
                                                        name="catigory[0][slug]">
                                                        @error("catigory.0.slug")
                                                            <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" name="catigory[0][active]"
                                                                value = 1
                                                                id="active"
                                                                class="switchery" data-color="success"
                                                                {{$data -> active  == 1 ? "checked" : ""}}/>
                                                            @error("catigory.0.active")
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        <label for="active"
                                                             class="card-title ml-1"> الحالة</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mt-1" style="width:150px; height:150px;">
                                                        <img style="width:100%;
                                                        height:100%" src="{{asset("public/asset/admin/images/categoris_photo/" . $data->photo)}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="photo"> صوره المنتج </label>
                                                    <input type="file" id="photo"
                                                        class="form-control"
                                                        placeholder="ادخل صوره القسم"
                                                        name="photo">
                                                    @error("photo")
                                                        <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <input type="hidden" name="hidden_photo" value="{{$data -> photo}}">
                                            <input type="hidden" name="id" value="1">
                                            <input type="hidden" name="catigory[{{0}}][id]" value={{$data -> id}}>





                                            @if($data2)
                                            <ul class="nav nav-tabs">
                                                @foreach ($data2 as $key => $val)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{$key == 0 ? "active" : ""}}" id="home-tab" data-toggle="tab" href="#home{{$key}}" aria-controls="home"
                                                        aria-expanded="{{$key == 0 ? "true" : "false"}}">{{trans("message." . $val -> shourtcut)}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>

                                            <div class="tab-content px-1 pt-1">
                                                @foreach ($data2 as $key => $val)
                                                    <div role="tabpanel" class="tab-pane {{$key == 0 ? "active" : ""}}" id="home{{$key}}" aria-labelledby="home-tab" aria-expanded="{{$key == 0 ? "true" : "false"}}">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="name">  اسم القسم - {{$val->shourtcut}}</label>
                                                                    <input type="text" id="name"
                                                                        class="form-control"
                                                                        placeholder="ادخل اسم القسم"
                                                                        value = "{{$val -> name}}"
                                                                        name="catigory[{{$key + 1}}][name]">
                                                                    @error("catigory." . ( $key + 1) . ".name")
                                                                        <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="description">  وصف القسم - {{$val ->shourtcut}}</label>
                                                                    <textarea type="text" id="description"
                                                                        class="form-control"
                                                                        autocomplete="description"
                                                                        placeholder="ادخل وصف القسم  "
                                                                        name="catigory[{{$key + 1}}][description]">{{$val -> description}}</textarea>
                                                                    @error("catigory." . ( $key + 1) . ".description")
                                                                        <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="slug">  الشعار - {{$val -> shourtcut}}</label>
                                                                    <input type="text" id="slug"
                                                                    class="form-control"
                                                                    placeholder="ادخل شعار القسم"
                                                                    value = "{{$val -> slug}}"
                                                                    name="catigory[{{$key + 1}}][slug]">
                                                                    @error("catigory." . ( $key + 1) . ".slug")
                                                                        <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group mt-1">
                                                                    <input type="checkbox" name="catigory[{{$key + 1}}][active]"
                                                                            value = 1
                                                                            id="active"
                                                                            class="switchery" data-color="success"
                                                                            {{$val -> active  == 1 ? "checked" : ""}}/>
                                                                        @error("catigory." . ( $key + 1) . ".active")
                                                                            <span class="text-danger"> {{$message}}</span>
                                                                        @enderror
                                                                    <label for="active"
                                                                            class="card-title ml-1"> الحالة</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="catigory[{{$key + 1}}][id]" value={{$val -> id}}>
                                                    </div>
                                                @endforeach
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
