<div class="card-body">
    <form action="{{ route('categories.index') }}" method="get">
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <input type="text" name="keyword" value="{{ old('keyword', request()->input('keyword')) }}" class="form-control" placeholder="ابحث هنا...!" />
                </div>
            </div>

            <!-- Start Status -->
            <div class="col-2">
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="">الحالــة</option>
                        <option value="1" {{ old('status', request()->input('status')) == 1 ? 'selected' : '' }}>فعــال</option>
                        <option value="0" {{ old('status', request()->input('status')) == 0 ? 'selected' : '' }}>غير فعــال</option>
                    </select>
                </div>
            </div>
            <!-- End Status -->

            <!-- Start Sorting -->
            <div class="col-2">
                <div class="form-group">
                    <select name="sort_by" class="form-control">
                        <option value="">الترتيب</option>
                        <option value="id" {{ old('sort_by', request()->input('sort_by')) == 'id' ? 'selected' : '' }}>الرقم</option>
                        <option value="name" {{ old('sort_by', request()->input('sort_by')) == 'name' ? 'selected' : '' }}>الاســم</option>
                        <option value="created_at" {{ old('sort_by', request()->input('sort_by')) == 'created_at' ? 'selected' : '' }}>تاريخ الانشاء</option>
                    </select>
                </div>
            </div>
            <!-- End Sorting -->

            <!-- Start Ordering -->
            <div class="col-2">
                <div class="form-group">
                    <select name="order_by" class="form-control">
                        <option value="">ترتيب تصاعدى / تنازلى</option>
                        <option value="asc" {{ old('order_by', request()->input('order_by')) == 'asc' ? 'selected' : '' }}>الترتيب تصاعدى</option>
                        <option value="desc" {{ old('order_by', request()->input('order_by')) == 'desc' ? 'selected' : '' }}>الترتيب تنازلى</option>
                    </select>
                </div>
            </div>
            <!-- End Ordering -->

            <!-- Start Limitation -->
            <div class="col-1">
                <div class="form-group">
                    <select name="limit_by" class="form-control">
                        <option value="">عرض</option>
                        <option value="10" {{ old('limit_by', request()->input('limit_by')) == '10' ? 'selected' : '' }}>10</option>
                        <option value="20" {{ old('limit_by', request()->input('limit_by')) == '20' ? 'selected' : '' }}>20</option>
                        <option value="50" {{ old('limit_by', request()->input('limit_by')) == '50' ? 'selected' : '' }}>50</option>
                        <option value="100" {{ old('limit_by', request()->input('limit_by')) == '100' ? 'selected' : '' }}>100</option>
                    </select>
                </div>
            </div>
            <!-- End Limitation -->
            <div class="col-2"></div>
            <div class="col-1">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">بحث</button>
                </div>
            </div>
        </div>
    </form>
</div>