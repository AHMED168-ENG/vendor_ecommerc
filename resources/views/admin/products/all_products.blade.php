@extends('admin/dashboard')
@section('title')
    all product
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> المنتجات  </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{Route("dashpored")}}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> المنتجات
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">جميع المنتجات </h4>
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
                                <div class="card-body card-dashboard">
                                    <table
                                        class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead>
                                        <tr>
                                            <th> الاسم</th>
                                            <th>القسم</th>
                                            <th>السعر</th>
                                            <th>الصوره</th>
                                            <th>التفعيل</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if ($products -> count() == 0)
                                                <tr class="text-center">
                                                    <td class="btn-outline-danger btn-lg text-capitalize" style="margin-top:20px !important;font-size:17px" colspan="10">there are no products to show</td>
                                                </tr>
                                            @else
                                                @foreach ($products as $item)
                                                    <tr>
                                                        <td>{{$item -> name}}</td>
                                                        <td>{{App\models\products\product_model::find($item -> id) -> get_catigory -> name }}</td>
                                                        <td>{{$item -> price }}</td>
                                                        <td><img style="width:60px;height:60px;display:block;margin:auto" src="{{ asset("public\asset\admin\images\products_image") . "/" . explode("__" , $item -> product_photo)[0]}}" alt=""></td>
                                                        <td>{{$item -> active == 0 ? "closed" : "open"}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <a href="{{Route('show_edit_product' , $item -> id)}}"
                                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديد</a>
                                                                <a href="{{Route("delete_product" , $item->id)}}"
                                                                class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
                                                                <a href="{{Route("active_product" , $item->id)}}"
                                                                class="btn btn-outline-cyan btn-min-width box-shadow-3 mr-1 mb-1">{{$item -> active == 0 ? "تفعيل" : "الغاء التفعيل"}}</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                    <div class="justify-content-center d-flex">
                                        {{ $products->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
