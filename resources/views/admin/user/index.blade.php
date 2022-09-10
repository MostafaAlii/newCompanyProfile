@extends('admin.admin_master')

@section('pageTitle')
المستخدمين
@endsection

@section('css')

@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">
            <i class="icon-user-following"></i>
            المستخدمين
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">  المستخدمين</a> <small> {{ $users->total() }} </small></li>
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
                    @if(auth()->user()->hasPermission('users_create'))
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            <span class="icon text-white-50">
                                <i class="icon-user-follow"></i>
                            </span>
                            <span class="text">اضافة مستخدم جديد</span>
                        </a>
                    @else
                        <a href="#" class="btn btn-primary disabled">
                            <span class="icon text-white-50">
                                <i class="icon-user-follow"></i>
                            </span>
                            <span class="text">اضافة مستخدم جديد</span>
                        </a>
                    @endif
                </div>
            </div>
            <!-- End Create User btn -->
            <!-- Start Search -->
            <div class="col-8">
                <form action="{{ route('users.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="ابحث عن مستخدم" value="{{ request()->search }}">
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
                        <th>الاسم</th>
                        <th>البريد الالكترونى</th>
                        <th>تاريخ الاضافة</th>
                        <th class="text-center" style="width: 30px;">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{$user->name }}</td>
                            <td>{{$user->email }}</td>
                            <td>{{$user->created_at->diffForhumans() }}</td>
                            <td>
                                <div class="btn-group">
                                    @if(auth()->user()->hasPermission('users_update'))
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    @else
                                        <a href="#" class="btn btn-primary disabled btn-sm">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    @endif
                                    @if(auth()->user()->hasPermission('users_delete'))
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" id="delete-user-{{$user->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="ft ft-trash-2"></i></button>
                                        </form>
                                    @else
                                        <button class="btn btn-danger disabled btn-sm"><i class="ft ft-trash-2"></i></button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-danger">
                                عفوا لا توجد مستخدمين حاليا قم باضافة بعض المستخدمين !!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="float-right">
                                {!! $users->appends(request()->query())->links() !!}
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