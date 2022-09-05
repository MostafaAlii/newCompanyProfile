<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller {
    public function index() {
        $categories = Category::withCount('projects')
        ->when(request()->keyword != null, function ($query){
            $query->search(request()->keyword);
        })
        ->when(request()->status != null, function ($query){
            $query->whereStatus(request()->status);
        })
        ->orderBy(request()->sort_by ?? 'id', request()->order_by ?? 'desc')
        ->paginate(request()->limit_by ?? 10);
        return view('admin.category.index', compact('categories'));
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request) {
        //return $request;
        try {
            $input['name'] = $request->name;
            $input['status'] = $request->status;
            Category::create($input);
            return redirect()->route('categories.index')->with([
                'message' => 'تم اضافة القسم بنجاح',
                'alert-type' => 'success'
            ]);
        } catch(\Exception $ex) {
            return redirect()->route('categories.index')->with([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);
        }
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}
