@extends('frontEnd/vindoers/vindoer_home')
@section('title')
Edit product
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="container match-height" style="margin:45px auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-center" id="basic-layout-form"> تعديل المنتج </h4>
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
                                <form class="form" action="{{route("update_product" , $product -> id)}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row all_data" style="margin:0">
                                        <div class="main_pairant col-md-6">
                                            <div data_id="0">
                                                <div class="form-group main_catigory" >
                                                    <label for="catigory"> القسم الرايسي </label>
                                                    <select onChange="ajax(event,{{0}})"  name="products[{{0}}][main_catigory_id][]" class=" form-control">
                                                        <optgroup label="اختر القسم الرءيسي">
                                                            <option value=""></option>
                                                            @foreach ($mainCatigory_model::Active_catigory($product -> shourtcut)->get() as $item)
                                                            <option value="{{$item -> id}}" >
                                                                {{$item -> name}}
                                                            </option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    @error("products.0.main_catigory_id.0")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="sup_catigory main" data_id="1" style="display:none">
                                                <div class="form-group">
                                                    <label for="products"> القسم الفرعي </label>
                                                    <select onChange="ajax(event,{{0}})" name="products[{{0}}][main_catigory_id][]" class=" form-control">
                                                        <optgroup label="اختر القسم الفرعي">

                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">  اسم المنتج - {{$product->shourtcut}}</label>
                                                <input type="text" id="name"
                                                class="form-control"
                                                placeholder="ادخل اسم المنتج"
                                                value = "{{$product -> name}}"
                                                name="products[{{0}}][name]">
                                                @error("products.0.name")
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 kind_car">
                                            <div class="form-group">
                                                <label for="products">نوع المنتج</label>
                                                <select name="products[0][kind_car]" class="select2 form-control">
                                                    <optgroup label="اختر نوع المنتج">
                                                        <option value=""></option>
                                                        @foreach ($kinds_cars::where("shourtcut" , $product -> shourtcut)->get() as $item)
                                                            <option value="{{$item -> id}}" {{$product -> kind_car == $item -> id ? "selected" : ""}}>{{$item -> name}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                                @error("products.0.kind_car")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 models">
                                            <div class="form-group">
                                                <label for="products"> موديل المنتج </label>
                                                <select name="products[0][model_cars]"  class="select2 form-control">
                                                    <optgroup label="اختر موديل المنتج">
                                                        <option value=""></option>
                                                        @foreach ($cars_model as $item)
                                                            <option value="{{$item -> id}}" {{$product -> model_car == $item -> id ? "selected" : ""}}>{{$item -> model}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                                @error("products.0.model_cars")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="products">حالت المنتج (جديد او مستعل)</label>
                                                <select name="products[0][state]" class="select2 form-control">
                                                    <optgroup label="اختر حالت المنتج">
                                                        <option value="0" {{$product -> state == "0" ? "checked" : ""}}>جديد</option>
                                                        <option value="1" {{$product -> state == "1" ? "checked" : ""}}>مستعمل</option>
                                                    </optgroup>
                                                </select>
                                                @error("products.0.state")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="description">  وصف المنتج - {{$product->shourtcut}}</label>
                                                        <textarea type="text" id="description"
                                                            class="form-control"
                                                            autocomplete="description"
                                                            placeholder="ادخل وصف المنتج  "
                                                            name="products[{{0}}][description]">{{$product -> description}}</textarea>
                                                        @error("products.0.description")
                                                            <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>





                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="price">  السعر</label>
                                                        <input type="number" id="price"
                                                        class="form-control"
                                                        placeholder="ادخل شعار المنتج"
                                                        value = "{{$product->price}}"
                                                        name="products[{{0}}][price]">
                                                        @error("products.0.price")
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pices">  القطع</label>
                                                        <input type="number" id="pices"
                                                        class="form-control"
                                                        placeholder="ادخل عدد قطع المنتج"
                                                        value = "{{$product -> pices}}"
                                                        name="products[{{0}}][pices]">
                                                        @error("products.0.pices")
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="numper_screen">  رقم الشاشه</label>
                                                        <input type="number" id="numper_screen"
                                                        class="form-control"
                                                        placeholder="ادخل رقم الشاشه"
                                                        value = "{{$product -> numper_screen}}"
                                                        name="products[{{0}}][numper_screen]">
                                                        @error("products.0.numper_screen")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="security"> الضمان</label>
                                                        <input type="number" id="security"
                                                        class="form-control"
                                                        placeholder="ادخل الضمان"
                                                        value = "{{$product -> security}}"
                                                        name="products[{{0}}][security]">
                                                        @error("products.0.security")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <input type="hidden" name="products[{{0}}][id]" value={{$product->id}}>
                                            </div>
                                            @if($other_product_language)
                                            <ul class="nav nav-tabs" style="margin:20px 0 ; border-color:#062C4C">
                                                @foreach ($other_product_language as $key => $val)
                                                    <li class="nav-item">
                                                        <a style="color:white;background:#062C4C;" class="nav-link {{$key == 0 ? "active" : ""}}" id="home-tab" data-toggle="tab" href="#home{{$key}}" aria-controls="home"
                                                        aria-expanded="{{$key == 0 ? "true" : "false"}}">{{trans("message." . $val -> shourtcut)}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>

                                            <div class="tab-content px-1 pt-1">
                                                @foreach ($other_product_language as $key => $val)
                                                    <div role="tabpanel" class="tab-pane {{$key == 0 ? "active" : ""}}" id="home{{$key}}" aria-labelledby="home-tab" aria-expanded="{{$key == 0 ? "true" : "false"}}">
                                                        <div class="row all_data">
                                                            <div class="main_pairant col-md-6">
                                                                <div data_id="0">
                                                                    <div class="form-group main_catigory" >
                                                                        <label for="catigory"> القسم الرايسي </label>
                                                                        <select onChange="ajax(event,{{$key + 1}})"  name="products[{{$key + 1}}][main_catigory_id][]" class=" form-control">
                                                                            <optgroup label="اختر القسم الرءيسي">
                                                                                <option value=""></option>
                                                                                @foreach ($mainCatigory_model::Active_catigory($val -> shourtcut)->get() as $item)
                                                                                <option value="{{$item -> id}}" {{old("products.$key.main_catigory_id") == $item -> id ? "selected" : ""}}>
                                                                                    {{$item -> name}}
                                                                                </option>
                                                                                @endforeach
                                                                            </optgroup>
                                                                        </select>
                                                                        @error("products." . ($key + 1) . ".main_catigory_id.0")
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>


                                                                <div class="sup_catigory main" data_id="1" style="display:none">
                                                                    <div class="form-group">
                                                                        <label for="products"> القسم الفرعي </label>
                                                                        <select onChange="ajax(event,{{$key + 1}})" name="products[{{$key}}][main_catigory_id][]" class=" form-control">
                                                                            <optgroup label="اختر القسم الفرعي">

                                                                            </optgroup>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="name">  اسم المنتج - {{$val->shourtcut}}</label>
                                                                    <input type="text" id="name"
                                                                    class="form-control"
                                                                    placeholder="ادخل اسم المنتج"
                                                                    value = "{{$val -> name}}"
                                                                    name="products[{{$key + 1}}][name]">
                                                                    @error("products." . ($key + 1) . ".name")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 kind_car">
                                                                <div class="form-group">
                                                                    <label for="products">نوع المنتج</label>
                                                                    <select name="products[{{$key + 1}}][kind_car]" class="select2 form-control">
                                                                        <optgroup label="اختر نوع المنتج">
                                                                            <option value=""></option>
                                                                            @foreach ($kinds_cars::where("shourtcut" , $val -> shourtcut)->get() as $item)
                                                                                <option value="{{$item -> id}}" {{$item -> id == $val -> kind_car ? "selected" : ""}}>{{$item -> name}}</option>
                                                                            @endforeach
                                                                        </optgroup>
                                                                    </select>
                                                                    @error("products." . ($key + 1) . ".kind_car")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 models">
                                                                <div class="form-group">
                                                                    <label for="products"> موديل المنتج </label>
                                                                    <select name="products[{{$key + 1}}][model_cars]"  class="select2 form-control">
                                                                        <optgroup label="اختر موديل المنتج">
                                                                            <option value=""></option>
                                                                            @foreach ($cars_model as $item)
                                                                                <option value="{{$item -> id}}" {{$item -> id == $val -> model_car ? "selected" : ""}}>{{$item -> model}}</option>
                                                                            @endforeach
                                                                        </optgroup>
                                                                    </select>
                                                                    @error("products." . ($key + 1) . ".model_cars")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="products">حالت المنتج (جديد او مستعل)</label>
                                                                    <select name="products[{{$key + 1}}][state]" class="select2 form-control">
                                                                        <optgroup label="اختر حالت المنتج">
                                                                            <option value="0" {{$val -> state == "0" ? "selected" : ""}}>جديد</option>
                                                                            <option value="1" {{$val -> state == "1" ? "selected" : ""}}>مستعمل</option>
                                                                        </optgroup>
                                                                    </select>
                                                                    @error("products." . ($key + 1) . ".state")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="description">  وصف المنتج - {{$val->shourtcut}}</label>
                                                                    <textarea type="text" id="description"
                                                                        class="form-control"
                                                                        autocomplete="description"
                                                                        placeholder="ادخل وصف المنتج  "
                                                                        name="products[{{$key + 1}}][description]">{{$val -> description}}</textarea>
                                                                    @error("products." . ($key + 1) . ".description")
                                                                        <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="price">  السعر</label>
                                                                    <input type="number" id="price"
                                                                    class="form-control"
                                                                    placeholder="ادخل شعار المنتج"
                                                                    value = "{{$val->price}}"
                                                                    name="products[{{$key + 1}}][price]">
                                                                    @error("products." . ($key + 1) . ".price")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="pices">  القطع</label>
                                                                    <input type="number" id="pices"
                                                                    class="form-control"
                                                                    placeholder="ادخل عدد قطع المنتج"
                                                                    value = "{{$val -> pices}}"
                                                                    name="products[{{$key + 1}}][pices]">
                                                                    @error("products." . ($key + 1) . ".pices")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="numper_screen">  رقم الشاشه</label>
                                                                    <input type="number" id="numper_screen"
                                                                    class="form-control"
                                                                    placeholder="ادخل رقم الشاشه"
                                                                    value = "{{$val -> numper_screen}}"
                                                                    name="products[{{$key + 1}}][numper_screen]">
                                                                    @error("products." . ($key + 1) . ".numper_screen")
                                                                        <span class="text-danger"> {{$message}}</span>
                                                                        @enderror
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="security"> الضمان</label>
                                                                    <input type="number" id="security"
                                                                    class="form-control"
                                                                    placeholder="ادخل الضمان"
                                                                    value = "{{$val -> security}}"
                                                                    name="products[{{$key + 1}}][security]">
                                                                    @error("products." . ($key + 1) . ".security")
                                                                        <span class="text-danger"> {{$message}}</span>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="products[{{$key + 1}}][id]" value={{$val->id}}>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                                </div>

                                            @endif

                                        <div class="row" style="margin-bottom:20px">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="photo"> صور المنتج </label>
                                                    <div class="photo_input">
                                                        <input multiple type="file" id="photo"
                                                        class="form-control"
                                                        placeholder="ادخل صوره المنتج"
                                                        name="product_photo[]">
                                                    </div>
                                                    @error("product_photo")
                                                    <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                    @error("product_photo.0")
                                                    <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex">
                                                    @foreach (explode("__" , $product -> product_photo) as $item)
                                                        @if ($item != "")
                                                            <div class="col-4">
                                                                <div>
                                                                    <img style="width:100%;height:100px" src="{{asset("public/asset/admin/images/products_image") . "/" . $item }}" alt="">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <input name="hidden_product_photo" type="hidden" value="{{$product -> product_photo}}">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="photo"> صور وصف المنتج </label>
                                                    <div class="photo_input">
                                                        <input multiple type="file" id="photo"
                                                        class="form-control"
                                                        placeholder="ادخل صور وصف المنتج"
                                                        name="description_photo[]">
                                                    </div>
                                                    @error("description_photo")
                                                    <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                    @error("description_photo.0")
                                                    <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex">
                                                    @foreach (explode("__" , $product -> description_photo) as $item)
                                                        @if ($item != "")
                                                            <div class="col-4">
                                                                <div>
                                                                    <img style="width:100%;height:100px" src="{{asset("public/asset/admin/images/products_image/description_photo") . "/" . $item }}" alt="">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <input name="hidden_description_photo" type="hidden" value="{{$product -> description_photo}}">


                                    <div class="form-actions" style="margin-right:15px">
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
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
@endsection
@section('script')
<script>


    function ajax(e,id){
            $.ajax({
                enctype:"multipart/form-data",
                url: "{{route('ajax_Get_supcatigory')}}" + "/" + e.target.value ,
                data: {
                    '_token': "{{csrf_token()}}",
                },
                type : "post",
                processData : true,
                cache : true,
                success : (data) => {
                    var main = document.querySelectorAll(".main_pairant")[id].querySelectorAll(".main");
                    var send = document.querySelectorAll(".send");
                    var ele = main[0].cloneNode(true);
                    ele.style.display = "block";
                    ele.setAttribute("data_id" , parseInt(main[main.length - 1].getAttribute("data_id")) + 1)
                    if( e.target.parentElement.parentElement.classList.contains("active")) {
                    for (let index = 0; index < main.length; index++) {
                        if((parseInt(main[index].getAttribute("data_id")) > parseInt(e.target.parentElement.parentElement.getAttribute("data_id"))) && parseInt(main[index].getAttribute("data_id")) != 1) {
                            main[index].remove();
                        }
                    }
                    }
                    e.target.parentElement.parentElement.classList.add("active")
                    if(data[0].length == 0) {
                        return "";
                    }
                    ele.querySelector("select optgroup").innerHTML = `<option></option>`
                    data[0].forEach(element => {
                        ele.querySelector("select optgroup").innerHTML +=
                        `<option value="`+ element["id"] + `" >` + element["name"] + `</option>`
                    });
                    var main = document.querySelectorAll(".main_pairant")[id];
                    main.appendChild(ele);

                }
            })
        }








</script>
<style>
    body  , .show input , .show select , .show textarea{
        background:#eee !important;
    }
    .show input["file"] {
        display:none
    }
    .photo_input {
        width:100%;
        height:40px;
        border:1px solid #ddd;
        background:#eee;
        position: relative;
        border-radius:3px
    }
    .photo_input input {
        position: absolute;
        width:100%;
        left: 0;
        top:0;
        height:100%;
        opacity: 0.2
    }
</style>
@endsection
