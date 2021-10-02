@extends('admin/dashboard')
@section('title')
    all comments
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> جميع الكومنتات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{Route("dashpored")}}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> الكومنتات
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
                                <h4 class="card-title">جميع الكومنتات </h4>
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
                                            <th> الكومنت</th>
                                            <th>الامنتج</th>
                                            <th>التفعيل</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if ($comments -> count() == 0)
                                                <tr class="text-center">
                                                    <td class="btn-outline-danger btn-lg text-capitalize" style="margin-top:20px !important;font-size:17px" colspan="10">there are no kind_car to show</td>
                                                </tr>
                                            @else
                                                @foreach ($comments as $item)
                                                    <tr>
                                                        <td class="over_flow"><p>{{$item -> comment}}</p></td>
                                                        <td class="over_flow"><p >{{$item -> get_product["name"]}}</p></td>
                                                        <td>{{$item -> active == 0 ? "closed" : "open"}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <a href="{{Route('edit_comments' , $item -> id)}}"
                                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديد</a>
                                                                <a href="{{Route("delete_comments" , $item->id)}}"
                                                                class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
                                                                <a href="{{Route("active_comments" , $item->id)}}"
                                                                class="btn btn-outline-cyan btn-min-width box-shadow-3 mr-1 mb-1">{{$item -> active == 0 ? "تفعيل" : "الغاء التفعيل"}}</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                    <div class="justify-content-center d-flex">
                                        {{ $comments->links() }}
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

<style>
    .over_flow {
        padding:0 !important
    }
    .over_flow p {
        overflow: hidden !important;
        width:100px !important;
        white-space:nowrap !important;
        text-overflow: ellipsis;
        margin:10px
    }
    .over_flow:hover {
        overflow: visible !important;
    }
    .over_flow:hover p{
        white-space:normal !important;

    }

</style>

@endsection
