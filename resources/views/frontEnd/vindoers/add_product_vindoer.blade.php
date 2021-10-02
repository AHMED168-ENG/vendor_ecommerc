@extends('frontEnd/vindoers/vindoer_home')
@section('title')
add product
@endsection
@section('content')
<div class="container">
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts" style="padding:55px 0">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title text-center" id="basic-layout-form"> إضافة منتج </h4>
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
                                        <form class="form" action="{{route("store_products")}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section" style="display:inline-block;margin:10px 0 ;color:#062C4C;padding-bottom:10px; border-bottom:1px solid #062C4C"><i class="ft-home"></i> بيانات المنتج </h4>
                                            @foreach (show_active_language() as $i => $lang )
                                            <div class="row all_data">
                                                <div class="main_pairant col-md-6">
                                                    <div data_id="0">
                                                        <div class="form-group main_catigory" >
                                                            <label for="catigory"> القسم الرايسي </label>
                                                            <select onChange="ajax(event,{{$i}})"  name="products[{{$i}}][main_catigory_id][]" class=" form-control">
                                                                <optgroup label="اختر القسم الرءيسي">
                                                                    <option value=""></option>
                                                                    @foreach ($mainCatigory_model::Active_catigory($lang -> shourtcut)->get() as $item)
                                                                    <option value="{{$item -> id}}" {{old("products.$i.main_catigory_id") == $item -> id ? "selected" : ""}}>
                                                                        {{$item -> name}}
                                                                    </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                            @error("products.$i.main_catigory_id.0")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="sup_catigory main" data_id="1" style="display:none">
                                                        <div class="form-group">
                                                            <label for="products"> القسم الفرعي </label>
                                                            <select onChange="ajax(event,{{$i}})" name="products[{{$i}}][main_catigory_id][]" class=" form-control">
                                                                <optgroup label="اختر القسم الفرعي">

                                                                </optgroup>
                                                            </select>
                                                            @error("products.$i.main_catigory_id")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">  اسم المنتج - {{$lang->name}}</label>
                                                        <input type="text" id="name"
                                                        class="form-control"
                                                        placeholder="ادخل اسم المنتج"
                                                        value = "{{old("products.$i.name")}}"
                                                        name="products[{{$i}}][name]">
                                                        @error("products.$i.name")
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6 kind_car">
                                                    <div class="form-group">
                                                        <label for="products">نوع المنتج</label>
                                                        <select name="products[{{$i}}][kind_car]" class="select2 form-control">
                                                            <optgroup label="اختر نوع المنتج">
                                                                <option value=""></option>
                                                                @foreach ($kinds_cars::where("shourtcut" , $lang -> shourtcut)->get() as $item)
                                                                    <option value="{{$item -> id}}">{{$item -> name}}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                        @error("products.$i.kind_car")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6 models">
                                                    <div class="form-group">
                                                        <label for="products"> موديل المنتج </label>
                                                        <select multiple name="products[{{$i}}][model_cars][]"  class="select2 form-control">
                                                            <optgroup label="اختر موديل المنتج">
                                                                <option value=""></option>
                                                                @foreach ($cars_model as $item)
                                                                    <option value="{{$item -> id}}">{{$item -> model}}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                        @error("products.$i.model_cars")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="products">حالت المنتج (جديد او مستعل)</label>
                                                        <select name="products[{{$i}}][state]" class="select2 form-control">
                                                            <optgroup label="اختر حالت المنتج">
                                                                <option value="0">جديد</option>
                                                                <option value="1">مستعمل</option>
                                                            </optgroup>
                                                        </select>
                                                        @error("products.$i.state")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="description">  وصف المنتج - {{$lang ->name}}</label>
                                                                <textarea type="text" id="description"
                                                                    class="form-control"
                                                                    autocomplete="description"
                                                                    placeholder="ادخل وصف المنتج  "
                                                                    name="products[{{$i}}][description]">{{old("products.$i.description")}}</textarea>
                                                                @error("products.$i.description")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="price"> السعر بالريال</label>
                                                                <input type="number" id="price"
                                                                class="form-control"
                                                                placeholder="ادخل السعر المنتج"
                                                                value = "{{old("products.$i.price")}}"
                                                                name="products[{{$i}}][price]">
                                                                @error("products.$i.price")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="descount"> الخصم اذا اردت</label>
                                                                <input type="number" id="descount"
                                                                class="form-control"
                                                                value = "{{old("products.$i.descount")}}"
                                                                placeholder="ادخل خصم المنتج اذا اردت "
                                                                value = "{{old("products.$i.descount")}}"
                                                                name="products[{{$i}}][descount]">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="pices">  القطع</label>
                                                                <input type="number" id="pices"
                                                                class="form-control"
                                                                placeholder="ادخل عدد قطع المنتج"
                                                                value = "{{old("products.$i.pices")}}"
                                                                name="products[{{$i}}][pices]">
                                                                @error("products.$i.pices")
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
                                                                value = "{{old("products.$i.numper_screen")}}"
                                                                name="products[{{$i}}][numper_screen]">
                                                                @error("products.$i.numper_screen")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="security">  الضمان بالشهر</label>
                                                                <input type="number" id="security"
                                                                class="form-control"
                                                                placeholder="ادخل الضمان"
                                                                value = "{{old("products.$i.security")}}"
                                                                name="products[{{$i}}][security]">
                                                                @error("products.$i.security")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="products[{{$i}}][shourtcut]" value={{$lang->shourtcut}}>
                                                    </div>
                                                    <hr>
                                                    @endforeach

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


                                            <div class="form-actions" style="margin:20px 15px 0">
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
    .select2-selection {
        background:#eee !important
    }
    </style>
@endsection
