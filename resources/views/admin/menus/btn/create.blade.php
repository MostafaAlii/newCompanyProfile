<div class="modal fade text-left" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel70" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel8">
                    <span class="icon text-white-50">
                        <i class="la la-plus"></i>
                    </span>
                    <span class="text">اضافة قائمة جديد</span>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('menus.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <!-- Start Page Name & Page Link -->
                    <div class="row">
                        <!-- Start Menu Name -->
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="ادخل الاسم" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Menu Name -->
                        <!-- Start Menu Link -->
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="link">الرابط</label>
                                <input type="text" name="link" id="link" class="form-control" placeholder="الرابط ادخل" value="{{ old('link') }}">
                                @error('link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Menu Link -->
                    </div>
                    <!-- End Menu Name & Menu Link -->

                    <!-- Start Menu Sorting & Menu Status -->
                    <div class="row">
                        <!-- Start Menu Status -->
                        <div class="col-12 col-md-6">
                            <label for="status">الحالة</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ old('status') == 1 ? 'selected' : null }}>فعــال</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : null }}>غير فعــال</option>
                            </select>
                            @error('status')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        <!-- End Menu Status -->
                        <!-- Start Menu Sorting -->
                        <div class="col-12 col-md-6">
                            <label for="sorting">ترتيب عرض القائمة</label>
                            <select name="sorting" class="form-control">
                                <option value="1" {{ old('sorting') == 1 ? 'selected' : null }}>1</option>
                                <option value="2" {{ old('sorting') == 2 ? 'selected' : null }}>2</option>
                                <option value="3" {{ old('sorting') == 3 ? 'selected' : null }}>3</option>
                                <option value="4" {{ old('sorting') == 4 ? 'selected' : null }}>4</option>
                                <option value="5" {{ old('sorting') == 5 ? 'selected' : null }}>5</option>
                                <option value="6" {{ old('sorting') == 6 ? 'selected' : null }}>6</option>
                                <option value="7" {{ old('sorting') == 7 ? 'selected' : null }}>7</option>
                                <option value="8" {{ old('sorting') == 8 ? 'selected' : null }}>8</option>
                                <option value="9" {{ old('sorting') == 9 ? 'selected' : null }}>9</option>
                                <option value="10" {{ old('sorting') == 10 ? 'selected' : null }}>10</option>
                            </select>
                            @error('sorting')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        <!-- End Menu Sorting -->
                    </div>
                    <!-- End Menu Sorting & Menu Status -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary">حفظ</button>
                    <button type="button" class="btn grey btn-outline-warning" data-dismiss="modal">اغلاق</button>
                </div>
            </form>
        </div>
    </div>
</div>