@extends('admin/dashboard')
@section('title')
    vindowers
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> المتاجر  </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{Route("dashpored")}}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> المتاجر
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
                                <h4 class="card-title">جميع المتاجر </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a vindoer-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a vindoer-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a vindoer-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a vindoer-action="close"><i class="ft-x"></i></a></li>
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
                                            <th> صوره المتجر</th>
                                            <th>الموبيل</th>
                                            <th>الايميل</th>
                                            <th>العنوان</th>
                                            <th>السجل التجاري</th>
                                            <th>التفعيل</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if ($vindoer -> count() == 0)
                                                <tr class="text-center">
                                                    <td class="btn-outline-danger btn-lg text-capitalize" style="margin-top:20px !important;font-size:17px" colspan="10">there are no vindoer to show</td>
                                                </tr>
                                            @else
                                                @foreach ($vindoer as $item)
                                                    <tr>
                                                        <td>{{$item -> name}}</td>
                                                        <td><img style="width:100px;height:100px" src="{{asset("public\asset\admin\images\\vindoer_image" . "\\" . $item -> shop_img)}}" alt=""></td>
                                                        <td>{{$item -> mobil }}</td>
                                                        <td>{{$item -> email }}</td>
                                                        <td>{{$item -> addres }}</td>
                                                        <td><a href="{{asset("public/asset/admin/files/vindoers_files/") . "/" . $item ->Commercial_Register}}" style="width:60px;height:60px;display:block;margin:auto">السجل التجاري</a></td>
                                                        <td>{{$item -> active == 0 ? "closed" : "open"}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <a href="{{route('edit_vindoer' , $item -> id)}}"
                                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديد</a>
                                                                <a href="{{Route("delete_vindoer" , $item-> id)}}"
                                                                class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
                                                                <a href="{{Route("active_vindoer" , $item->id)}}"
                                                                class="btn btn-outline-cyan btn-min-width box-shadow-3 mr-1 mb-1">{{$item -> active == "0" ? "تفعيل" : "الغاء التفعيل"}}</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                    <div class="justify-content-center d-flex">
                                        {{ $vindoer->links() }}
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
