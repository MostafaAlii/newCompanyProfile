@extends('admin.admin_master')

@section('pageTitle')
الشركاء
@endsection

@section('css')

@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">
            <i class="icon-energy"></i>
            الشركاء
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('partners.index') }}">  الشركاء</a>
                        <span class="badge badge-success round"> {{ $partners->total() }} </span>
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
                    @if(auth()->user()->hasPermission('partners_create'))
                        <a href="{{ route('partners.create') }}" class="btn btn-primary">
                            <span class="icon text-white-50">
                                <i class="la la-plus"></i>
                            </span>
                            <span class="text">اضافة شريك جديد</span>
                        </a>
                    @else
                        <a href="#" class="btn btn-primary disabled">
                            <span class="icon text-white-50">
                                <i class="la-plus"></i>
                            </span>
                            <span class="text">اضافة شريك جديد</span>
                        </a>
                    @endif
                </div>
            </div>
            <!-- End Create User btn -->
            <!-- Start Search -->
            <div class="col-8">
                <form action="{{ route('partners.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="ابحث بالاســـم او الرابــط " value="{{ request()->search }}">
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
                        <th>تاريخ الاضافة</th>
                        <th class="text-center" style="width: 30px;">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($partners as $index=>$partner)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{$partner->name }}</td>
                            <td>
                                @if($partner->image_path)
                                    <img src="{{ $partner->image_path }}" style="width: 50px; height: 50px;" class="img-thumbnail" alt="{{$partner->name }}">
                                @else
                                    <img src="{{ asset('uploads/partner_images/default.png') }}" style="width: 50px; height: 50px;" class="img-thumbnail" alt="{{$partner->name }}">
                                @endif
                            </td>
                            <td>
                                @if($partner->status == 1)
                                    <span class="badge badge-success">مفعل</span>
                                @else
                                    <span class="badge badge-danger">غير مفعل</span>
                                @endif
                            </td>
                            <td><a href="{{$partner->link }}" target="_blank">اضغط لمعاينة الرابط</a></td>
                            <td>{{$partner->created_at->diffForhumans() }}</td>
                            <td>
                                <div class="btn-group">
                                    @if(auth()->user()->hasPermission('partners_update'))
                                    <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-primary btn-sm">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    @else
                                        <a href="#" class="btn btn-primary disabled btn-sm">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    @endif
                                    @if(auth()->user()->hasPermission('partners_delete'))
                                        <form action="{{ route('partners.destroy', $partner->id) }}" method="POST" id="delete-user-{{$partner->id}}">
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
                                عفوا لا يوجد شركاء حاليا قم باضافة بعض الشركاء !!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="float-right">
                                {!! $partners->appends(request()->query())->links() !!}
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