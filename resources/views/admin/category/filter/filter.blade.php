<!-- Start Search -->
<div class="col-8">
    <form action="{{ route('categories.index') }}" method="GET">
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