@extends('admin.admin_master')

@section('pageTitle')
الصفحات
@endsection

@section('css')

@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">
            <i class="icon-docs"></i>
            الصفحات
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('pages.index') }}">الصفحات</a>
                        <span class="badge badge-success round"> {{ $pages->total() }} </span>
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
                    {{--@if(auth()->user()->hasPermission('pages_create'))--}}
                        <a href="{{ route('pages.create') }}" class="btn btn-primary">
                            <span class="icon text-white-50">
                                <i class="la la-plus"></i>
                            </span>
                            <span class="text">اضافة صفحة جديد</span>
                        </a>
                    {{--@else
                        <a href="#" class="btn btn-primary disabled">
                            <span class="icon text-white-50">
                                <i class="la-plus"></i>
                            </span>
                            <span class="text">اضافة صفحة جديد</span>
                        </a>
                    @endif--}}
                </div>
            </div>
            <!-- End Create User btn -->
            <!-- Start Search -->
            <div class="col-8">
                <form action="{{ route('pages.index') }}" method="GET">
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
                        <th>الصورة</th>
                        <th>الحالة</th>
                        <th>الرابط</th>
                        <th>مضافة بواسطة</th>
                        <th>تاريخ الاضافة</th>
                        <th class="text-center" style="width: 30px;">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pages as $index=>$page)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{$page->name }}</td>
                            <td>
                                @if($page->image_path)
                                    <img src="{{ $page->image_path }}" style="width: 50px; height: 50px;" class="img-thumbnail" alt="{{$page->name }}">
                                @else
                                    <img src="{{ asset('uploads/website/default.png') }}" style="width: 50px; height: 50px;" class="img-thumbnail" alt="{{$page->name }}">
                                @endif
                            </td>
                            <td>
                                @if($page->status == 1)
                                    <span class="badge badge-success">مفعل</span>
                                @else
                                    <span class="badge badge-danger">غير مفعل</span>
                                @endif
                            </td>
                            <td><a href="{{$page->link }}" target="_blank">اضغط لمعاينة الرابط</a></td>
                            <td>{{ $page->username }}</td>
                            <td>{{$page->created_at->diffForhumans() }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary btn-sm">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST" id="delete-user-{{$page->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="ft ft-trash-2"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-danger">
                                عفوا لا يوجد صفحات حاليا قم باضافة بعض الصفحات !!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <div class="float-right">
                                {!! $pages->appends(request()->query())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- End Table -->
    </div>
</div>
@endsection

@section('js')

@endsection