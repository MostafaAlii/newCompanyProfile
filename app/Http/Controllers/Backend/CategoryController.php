<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller {
    public function index(Request $request) {
        $categories = Category::where(function($query) use ($request){
            return $query->when($request->search, function($q) use ($request){
                return $q->where('name', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(10);
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

    public function edit(Category $category) {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category) {
        try {
            $input['name'] = $request->name;
            $input['slug'] = null;
            $input['status'] = $request->status;
            $category->update($input);
            return redirect()->route('categories.index')->with([
                'message' => 'تم تعديل القسم بنجاح',
                'alert-type' => 'success'
            ]);
        } catch(\Exception $ex) {
            return redirect()->route('categories.index')->with([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);
        }
    }

    public function destroy(Category $category) {      
        try {
            $category->delete();
            return redirect()->route('categories.index')->with([
                'message' => 'تم حذف القسم بنجاح',
                'alert-type' => 'success'
            ]);
        } catch(\Exception $ex) {
            return redirect()->route('categories.index')->with([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);
        }
    }
}
