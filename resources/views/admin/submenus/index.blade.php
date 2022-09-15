@extends('admin.admin_master')

@section('pageTitle')
القوائم الفرعية
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('sub-menus.index') }}">القوائم الفرعية</a>
                        <span style="width: 10px;"></span>
                        <span class="badge badge-success round"> {{ $submenus->count() }} </span>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSubMenus">
                        <span class="icon text-white-50">
                            <i class="la la-plus"></i>
                        </span>
                        <span class="text">اضافة قائمة جديد</span>
                   </button>
                </div>
            </div>
            <!-- End Create User btn -->
            <!-- Start Search -->
            <div class="col-8">
                <form action="{{ route('sub-menus.index') }}" method="GET">
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
                    <tr class="text-center">
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الرابط</th>
                        <th>الترتيب</th>
                        <th>القائمة الرئيسية</th>
                        <th>مضافة بواسطة</th>
                        <th>تاريخ الاضافة</th>
                        <th class="text-center" style="width: 30px;">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                     @forelse($submenus as $index=>$submenu)
                        <tr class="text-center">
                            <td>{{ $index + 1 }}</td>
                            <td>{{$submenu->name }}</td>
                            <td><a href="{{$submenu->link }}" target="_blank">اضغط لمعاينة الرابط</a></td>
                            <td>
                                @if($submenu->sorting == 1)
                                    <span class="badge badge-success">{{$submenu->sorting}}</span>
                                @else
                                    <span class="badge badge-primary">{{$submenu->sorting}}</span>
                                @endif
                            </td>
                            <td><span class="badge badge-primary">{{ $submenu->menu->name }}</span></td>
                            <td>{{ $submenu->username }}</td>
                            <td>{{$submenu->created_at->diffForhumans() ?? '' }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('sub-menus.edit', $submenu->id) }}" class="btn btn-primary btn-sm">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{ route('sub-menus.destroy', $submenu->id) }}" method="POST" id="delete-user-{{$submenu->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="ft ft-trash-2"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-danger">
                                عفوا لا يوجد صفحات حاليا قم باضافة بعض القوائم !!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="9">
                            <div class="float-right">
                                {!! $submenus->appends(request()->query())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- End Table -->
        @include('admin.submenus.btn.create')
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2([
            'placeholder' => 'اختر قائمة'
        ]);
    });
@endsection