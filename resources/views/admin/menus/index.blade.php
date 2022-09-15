@extends('admin.admin_master')

@section('pageTitle')
القوائم
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">
            <i class="icon-list"></i>
            القوائم
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="breadcrumb-item"><a href="#">الصفحات</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('menus.index') }}">القوائم</a>
                        <span style="width: 10px;"></span>
                        <span class="badge badge-success round"> {{ $menus->count() }} </span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<div class="content-wrapper">
    <div class="content-body">
        <!-- Start Create btn row -->
        <div class="row">
            <!-- Start Create User btn -->
            <div class="col-4">
                <div class="ml-auto">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenu">
                        <span class="icon text-white-50">
                            <i class="la la-plus"></i>
                        </span>
                        <span class="text">اضافة قائمة جديد</span>
                   </button>
                   <!-- Start Sub Menu Index Link -->
                    <a href="{{ route('sub-menus.index') }}" class="btn btn-info">
                            <span class="icon text-white-50">
                                <i class="la la-list"></i>
                            </span>
                            <span class="text">القوائم الفرعية</span>
                            <span style="width: 10px;"></span>
                            <span class="badge badge-warning round"> {{ SubMenu::count() }} </span>
                    </a>
                    <!-- End Sub Menu Index Link -->
                </div>
            </div>
            <!-- End Create User btn -->
            <!-- Start Search -->
            <div class="col-8">
                <form action="{{ route('menus.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="ابحث بالاســـم " value="{{ request()->search }}">
                        <div class="input-group-append">
                            <button class="btn btn-light" type="submit">
                                <i class="icon-magnifier"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Search -->
        </div>
        <!-- End Create btn row -->
        <hr>
        <!-- Start Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                 <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الحالة</th>
                        <th>الرابط</th>
                        <th>الترتيب</th>
                        <th>مضافة بواسطة</th>
                        <th>تاريخ الاضافة</th>
                        <th class="text-center" style="width: 30px;">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                     @forelse($menus as $index=>$menu)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{$menu->name }}</td>
                            <td>
                                @if($menu->status == 1)
                                    <span class="badge badge-success">مفعل</span>
                                @else
                                    <span class="badge badge-danger">غير مفعل</span>
                                @endif
                            </td>
                            <td><a href="{{$menu->link }}" target="_blank">اضغط لمعاينة الرابط</a></td>
                            <td>
                                @if($menu->sorting == 1)
                                    <span class="badge badge-success">{{$menu->sorting}}</span>
                                @else
                                    <span class="badge badge-primary">{{$menu->sorting}}</span>
                                @endif
                            </td>
                            <td>{{ $menu->username }}</td>
                            <td>{{$menu->created_at->diffForhumans() }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-toggle="modal" data-target="#createMenuInfo{{$menu->id}}">
                                        <span class="icon text-white-50">
                                            <i class="material-icons">info</i>
                                        </span>
                                    </a>
                                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-primary btn-sm">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" id="delete-user-{{$menu->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="ft ft-trash-2"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @include('admin.menus.btn.createMenuInfo')
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-danger">
                                عفوا لا يوجد صفحات حاليا قم باضافة بعض القوائم !!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <div class="float-right">
                                {!! $menus->appends(request()->query())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- End Table -->
        @include('admin.menus.btn.create')
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection