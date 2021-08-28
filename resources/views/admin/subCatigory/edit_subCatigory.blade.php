@extends('admin/dashboard')
@section('title')
edit subcatigory
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
                            <li class="breadcrumb-item"><a href="{{route('all_catigory')}}">الاقسام الفرعيه</a>
                            </li>
                            <li class="breadcrumb-item active">تعديل قسم فرعي جديد
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

                                <h4 class="card-title" id="basic-layout-form">{{$subCatigory -> name}} -- تعديل قسم فرعي</h4>
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
                                    <form class="form" action="" method="post"
                                          enctype="multipart/form-data">
                                          <h4 class="form-section"><i class="ft-home"></i> بيانات القسم الفرعي</h4>

                                          @csrf

                                            <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">  اسم القسم - {{$subCatigory->shourtcut}}</label>
                                                            <input type="text" id="name"
                                                                class="form-control"
                                                                placeholder="ادخل اسم القسم"
                                                                value = "{{$subCatigory -> name}}"
                                                                name="subcatigory[0][name]">
                                                            @error("subcatigory.0.name")
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="description">  وصف القسم - {{$subCatigory->shourtcut}}</label>
                                                            <textarea type="text" id="description"
                                                                class="form-control"
                                                                autocomplete="description"
                                                                placeholder="ادخل وصف القسم  "
                                                                name="subcatigory[0][description]">{{$subCatigory -> description}}</textarea>
                                                            @error("subcatigory.0.description")
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> القسم الرايسي </label>
                                                            <select name="subcatigory[0][main_catigory_id]" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر اتجاه اللغة ">
                                                                    @foreach ($mainCatigory_model::where("shourtcut" , $subCatigory->shourtcut)->where("id" , "!=" , $subCatigory->id)->get() as $item)
                                                                        <option style="display:flex; justify-content: space-between" value="{{$item -> id}}" {{$subCatigory -> main_catigory_id == $item -> id ? "selected" : ""}}>
                                                                            <span style="float: left">{{$item -> main_catigory_id > 0 ? "فرعي" : "رءيسي"}}</span> ---
                                                                            <span>{{$item -> name}}</span>
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                            @error("subcatigory.0.main_catigory_id")
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" name="subcatigory[0][active]"
                                                                    value = 1
                                                                    id="active"
                                                                    class="switchery" data-color="success"
                                                                    {{$subCatigory -> active  == 1 ? "checked" : ""}}/>
                                                                @error("subcatigory.0.active")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            <label for="active"
                                                                class="card-title ml-1"> الحالة - {{$subCatigory->shortcut}}</label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="subcatigory[0][id]" value={{$subCatigory->id}}>
                                                </div>
                                                <hr>

                                        <div class="form-body">
                                            @if($language)
                                            <ul class="nav nav-tabs">
                                                @foreach ($language as $key => $val)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{$key == 0 ? "active" : ""}}" id="home-tab" data-toggle="tab" href="#home{{$key}}" aria-controls="home"
                                                        aria-expanded="{{$key == 0 ? "true" : "false"}}">{{trans("message." . $val -> shourtcut)}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>

                                            <div class="tab-content px-1 pt-1">
                                                @foreach ($language as $key => $val)
                                                    <div role="tabpanel" class="tab-pane {{$key == 0 ? "active" : ""}}" id="home{{$key}}" aria-labelledby="home-tab" aria-expanded="{{$key == 0 ? "true" : "false"}}">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="name">  اسم القسم - {{$val->shourtcut}}</label>
                                                                    <input type="text" id="name"
                                                                        class="form-control"
                                                                        placeholder="ادخل اسم القسم"
                                                                        value = "{{$val -> name}}"
                                                                        name="subcatigory[{{$key + 1}}][name]">
                                                                    @error("subcatigory." . ($key + 1) . ".name")
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
                                                                        name="subcatigory[{{$key + 1}}][description]">{{$val -> description}}</textarea>
                                                                    @error("subcatigory." . ( $key + 1) . ".description")
                                                                        <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput2"> القسم الرايسي </label>
                                                                    <select style="width:100%" name="subcatigory[{{$key + 1}}][main_catigory_id]" class="select2 form-control">
                                                                        <optgroup label="من فضلك أختر اتجاه اللغة ">
                                                                            @foreach ($mainCatigory_model::Active_catigory($val -> shourtcut)->where("id" , "!=" , $val->id)->get() as $item)
                                                                                <option style="display:flex; justify-content: space-between" value="{{$item -> id}}" {{$subCatigory -> main_catigory_id == $item -> id ? "selected" : ""}}>
                                                                                    <span style="float: left">{{$item -> main_catigory_id > 0 ? "فرعي" : "رءيسي"}}</span> ---
                                                                                    <span>{{$item -> name}}</span>
                                                                                </option>
                                                                            @endforeach
                                                                        </optgroup>
                                                                    </select>
                                                                    @error("subcatigory.{{$key}}.main_catigory_id")
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group mt-1">
                                                                    <input type="checkbox" name="subcatigory[{{$key + 1}}][active]"
                                                                            value = 1
                                                                            id="active"
                                                                            class="switchery" data-color="success"
                                                                            {{$val -> active  == 1 ? "checked" : ""}}/>
                                                                        @error("subcatigory." . ( $key + 1) . ".active")
                                                                            <span class="text-danger"> {{$message}}</span>
                                                                        @enderror
                                                                    <label for="active"
                                                                            class="card-title ml-1"> الحالة</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="subcatigory[{{$key + 1}}][id]" value={{$val -> id}}>
                                                    </div>
                                                @endforeach
                                              </div>

                                            @endif

                                            <div class="col-md-6">
                                                <img style="width:150px; height:150px;margin-bottom:20px" src="{{asset("public/asset/admin/images/subCatigory_photo/") . "/" . $subCatigory -> photo}}" alt="">
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
                                        <input type="hidden" name="hidden_photo" value="{{$subCatigory -> photo}}">

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
