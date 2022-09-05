@extends('admin.admin_master')

@section('pageTitle')
المشاريع
@endsection

@section('css')

@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">
            <i class="icon-puzzle"></i>
            المشاريع
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">المشاريــع</a></li>
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
            <div class="col-12">
                <div class="ml-auto">
                    <a href="" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">اضافة مشروع جديد</span>
                    </a>
                </div>
            </div>
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
                    @forelse($projects as $project)
                        <tr>
                            <td>{{$project->name }}</td>
                            <td>{{$project->projects_count }}</td>
                            <td>{{$project->status }}</td>
                            <td>{{$project->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a href="{{ route('projects.destroy', $project->id) }}" class="btn btn-danger">
                                        <i class="ft ft-trash-2"></i>

                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-danger">
                                عفوا لا توجد مشاريع حاليا قم باضافة بعض المشاريع !!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="float-right">
                                Paginate
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