@extends('admin/dashboard')
@section('title')
edit comment
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
                            <li class="breadcrumb-item"><a href="{{route('all_comments')}}"> الكومنتات</a>
                            </li>
                            <li class="breadcrumb-item active">تعديل الكومنت
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
                                <h4 class="card-title" id="basic-layout-form"> تعديل الكومنت </h4>
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
                                        <h4 class="form-section"><i class="ft-home"></i> بيانات الكومنت </h4>
                                        <div class="row all_data">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title"> كومنت</label>
                                                    <textarea autofocus type="text" id="title"
                                                    class="form-control"
                                                    placeholder="ادخل الكومنت"
                                                    name="comment">{{$comment -> comment}}</textarea>
                                                    @error("comment")
                                                        <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for=""> احتر المنتج الذي تريد كتابه الكومنت له</label>
                                                    <select name="product" class="select2 form-control">
                                                        <optgroup label="احتر المنتج الذي تريد كتابه الكومنت له  ">
                                                            <option value=""></option>
                                                            @foreach ($all_product as $item)
                                                                <option value="{{$item -> id}}" {{$comment -> product_id == $item -> id ? "selected" : ""}}>{{$item -> name}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    @error("product")
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>





                                            <div class="col-md-6">
                                                <div class="form-group mt-1">
                                                    <input type="checkbox" name="active"
                                                    value = 1
                                                    id="active"
                                                    class="switchery" data-color="success"
                                                            {{$comment->active  == "1" ? "checked" : ""}}/>
                                                        <label for="active"
                                                            class="card-title ml-1"> الحالة </label>
                                                        </div>
                                            </div>
                                        </div>
                                        <hr>


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
