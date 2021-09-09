@extends('admin/dashboard')
@section('title')
add subcatigory
@endsection

@section('content')
{{$data = ""}}
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashpored')}}">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('all_subCatigory')}}">الاقسام الفرعيه</a>
                            </li>
                            <li class="breadcrumb-item active">إضافة قسم فرعي جديد
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
                                <h4 class="card-title" id="basic-layout-form"> إضافة قسم فرعي</h4>
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
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> بيانات القسم الفرعي</h4>
                                            @foreach (show_active_language() as $i => $lang )
                                                <div class="row all_data">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">  اسم القسم - {{$lang->name}}</label>
                                                            <input type="text" id="name"
                                                                class="form-control"
                                                                placeholder="ادخل اسم القسم"
                                                                value = "{{old("subcatigory.$i.name")}}"
                                                                name="subcatigory[{{$i}}][name]">
                                                            @error("subcatigory.$i.name")
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="description">  وصف القسم - {{$lang ->name}}</label>
                                                            <textarea type="text" id="description"
                                                                class="form-control"
                                                                autocomplete="description"
                                                                placeholder="ادخل وصف القسم  "
                                                                name="subcatigory[{{$i}}][description]">{{old("subcatigory.$i.description")}}</textarea>
                                                            @error("subcatigory.$i.description")
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" data_id="0">
                                                        <div class="form-group main_catigory" >
                                                            <label for="projectinput2"> القسم الرايسي </label>
                                                            <select onChange="ajax(event,{{$i}})"  name="subcatigory[{{$i}}][main_catigory_id][]" class=" form-control">
                                                                <optgroup label="اختر القسم الرءيسي">
                                                                    <option value=""></option>
                                                                    @foreach ($mainCatigory_model::Active_catigory($lang -> shourtcut)->get() as $item)
                                                                        <option value="{{$item -> id}}" {{old("subcatigory.$i.main_catigory_id") == $item -> id ? "selected" : ""}}>
                                                                            {{$item -> name}}
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                            @error("subcatigory.$i.main_catigory_id.0")
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 sup_catigory main" data_id="1" style="display:none">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> القسم الفرعي </label>
                                                            <select onChange="ajax(event,{{$i}})" name="subcatigory[{{$i}}][main_catigory_id][]" class=" form-control">
                                                                <optgroup label="اختر القسم الفرعي">

                                                                </optgroup>
                                                            </select>
                                                            @error("subcatigory.$i.main_catigory_id")
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 send">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" name="subcatigory[{{$i}}][active]"
                                                                    value = 1
                                                                    id="active"
                                                                    class="switchery" data-color="success"
                                                                    {{old("subcatigory.$i.active")  == 1 ? "checked" : ""}}/>
                                                                @error("subcatigory.$i.active")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            <label for="active"
                                                                class="card-title ml-1"> الحالة - {{$lang->name}}</label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="subcatigory[{{$i}}][shourtcut]" value={{$lang->shourtcut}}>
                                                </div>
                                                <hr>
                                            @endforeach

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
@section('script')
<script>
    var main_catigory = $(".main_catigory select");
    function ajax(e,id){
            $.ajax({
                enctype:"multipart/form-data",
                url: "ajax_Get_supcatigory/" + e.target.value ,
                data: {
                    '_token': "{{csrf_token()}}",
                },
                type : "post",
                processData : true,
                cache : true,
                success : (data) => {

                    var main = document.querySelectorAll(".all_data")[id].querySelectorAll(".main");
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
                    if(data.length == 0) {
                        return "";
                    }
                    ele.querySelector("select optgroup").innerHTML = `<option></option>`
                    data.forEach(element => {
                        ele.querySelector("select optgroup").innerHTML +=
                        `<option value="`+ element["id"] + `" >` + element["name"] + `</option>`
                    });
                    e.target.parentElement.parentElement.parentElement.insertBefore(ele , null )
                }
            })
        }
</script>
@endsection
@endsection
