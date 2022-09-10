@extends('admin.admin_master')

@section('pageTitle')
المشاريــع
@endsection

@section('css')

@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">
            <i class="icon-puzzle"></i>
            المشاريــع
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
                    <a href="{{ route('projects.create') }}" class="btn btn-primary">
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
        @include('admin.project.filter.filter')
        <!-- Start Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الصورة</th>
                        <th>حالة المشروع</th>
                        <th>القسم التابع</th>
                        <th>تاريخ الاضافة</th>
                        <th class="text-center" style="width: 30px;">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{$project->name }}</td>
                            <td>
                               @if($project->firstMedia)
                                    <img src="{{ asset('images/projects/' . $project->firstMedia->file_name) }}" class="rounded-circle" width="50px" height="50px" alt="{{$project->name}}">
                                @else
                                    <img src="{{ asset('images/projects/default.jpg') }}" class="rounded-circle" width="50px" height="50px" alt="default.jpg">
                                @endif
                            </td>
                            <td>{{$project->status() }}</td>
                            <td>{{$project->category->name }}</td>
                            <td>{{$project->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a href="javascript:void(0);" onclick="if(confirm('هل انت متاكد من الحذف')){document.getElementById('delete-project-{{$project->id}}').submit();} else{return false;}" class="btn btn-danger">
                                        <i class="ft ft-trash-2"></i>
                                    </a>
                                </div>
                                <form class="d-none" action="{{ route('projects.destroy', $project->id) }}" method="POST" id="delete-project-{{$project->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-danger">
                                عفوا لا يوجد مشاريع حاليا قم باضافة بعض المشاريع !!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="float-right">
                                {!! $projects->appends(request()->all())->links() !!}
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