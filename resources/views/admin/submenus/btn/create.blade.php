<div class="modal fade text-left" id="addSubMenus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel70" aria-hidden="true">
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
            <form action="{{ route('sub-menus.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <!-- Start Menu Name & Menu Link -->
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
                                <input type="url" name="link" id="link" class="form-control" placeholder="الرابط ادخل" value="{{ old('link') }}">
                                @error('link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Menu Link -->
                    </div>
                    <!-- End Menu Name & Menu Link -->

                    <!-- Start Menu Select from Menu::class -->
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="menu_id">القائمة</label>
                                <select name="menu_id" id="menu_id" class="form-control select2">
                                    <optgroup label="اختر القائمة">
                                        @forelse ($menus as $menu)
                                            <option value="{{ $menu->id }}" {{ old('menu_id') == $menu->id ? 'selected' : '' }}>
                                                {{ $menu->name }}
                                            </option>
                                        @empty
                                            <option>لا يوجد قوائم اضف بعض القوائم الرئيسية</option>
                                        @endforelse
                                    </optgroup>
                                </select>
                                @error('menu_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- End Menu Select from Menu::class -->
                    <!-- Start Menu Sorting & Menu Status -->
                    <div class="row">
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