<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Models\{Page, Setting};
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PagesController extends Controller {
    public function index(Request $request) {
        $pages = Page::where(function($query) use ($request){
            return $query->when($request->search, function($q) use ($request){
                return $q->where('name', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    public function create() {
        return view('admin.pages.create');
    }

    public function store(Request $request) {
       // try{
            $request->validate([
                'name' => 'required',
                'link' => 'required|unique:pages,link',
                'status' => 'required|in:0,1',
                'sorting' => 'required|unique:pages,sorting|in:1,2,3,4,5,6,7,8,9,10',
                'primary_title' => 'required',
                'secondry_title' => 'required',
                'description' => 'sometimes|nullable',
            ]);
            $username = auth()->user()->name;
            $request->merge(['username' => $username]);
            $request_data = $request->except(['submit', '_token']);
            Page::create($request_data);
            return redirect()->route('pages.index')->with([
                'message' => 'تم اضافة الصفحة بنجاح',
                'alert-type' => 'success'
            ]);
        /*} catch (\Exception $e) {
            return redirect()->route('pages.index')->with([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);*/
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
