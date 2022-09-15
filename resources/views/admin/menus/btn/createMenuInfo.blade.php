<div class="modal fade text-left" id="createMenuInfo{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel70" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel8">
                    <span class="icon text-white-50">
                        <i class="la la-plus"></i>
                    </span>
                    <span class="text">اضافة محتوى للقائمة</span>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('menu-infos.update', 'test') }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <input hidden name="menu_id" value="{{ $menu->id }}">
                    <div class="row">
                        <!-- Start Primary Title -->
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="primary_title">العنوان الرئيسى</label>
                                <input type="text" name="primary_title" id="primary_title" class="form-control" placeholder="ادخل الاسم" value="{{ $menu->menu_info->primary_title }}">
                                @error('primary_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Primary Title Name -->
                        <!-- Start Secondry Title -->
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="primary_title">العنوان الفرعى</label>
                                <input type="text" name="secondry_title" id="primary_title" class="form-control" placeholder="ادخل الاسم" value="{{ $menu->menu_info->secondry_title }}">
                                @error('secondry_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Secondry Title Name -->
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary">حفظ</button>
                    <button type="button" class="btn grey btn-outline-warning" data-dismiss="modal">اغلاق</button>
                </div>
            </form>
        </div>
    </div>
</div>