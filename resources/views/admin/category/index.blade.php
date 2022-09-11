@extends('admin.admin_master')

@section('pageTitle')
الاقسام
@endsection

@section('css')

@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">
            <i class="icon-drawer"></i>
            الاقسام
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">الاقســـام</a></li>
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
            <div class="col-4">
                <div class="ml-auto">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">اضافة قسم جديد</span>
                    </a>
                </div>
            </div>
            @include('admin.category.filter.filter')
        </div>
        <!-- End Create btn row -->
        <hr>
        <!-- Start Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>عدد المشاريع</th>
                        <th>حالة القسم</th>
                        <th>تاريخ الاضافة</th>
                        <th class="text-center" style="width: 30px;">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{$category->name }}</td>
                            <td>{{$category->projects_count }}</td>
                            <td>{{$category->status() }}</td>
                            <td>{{$category->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a href="javascript:void(0);" onclick="if(confirm('هل انت متاكد من الحذف')){document.getElementById('delete-category-{{$category->id}}').submit();} else{return false;}" class="btn btn-danger">
                                        <i class="ft ft-trash-2"></i>
                                    </a>
                                </div>
                                <form class="d-none" action="{{ route('categories.destroy', $category->id) }}" method="POST" id="delete-category-{{$category->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-danger">
                                عفوا لا توجد اقسام حاليا قم باضافة بعض الاقسام !!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="float-right">
                                {!! $categories->appends(request()->all())->links() !!}
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