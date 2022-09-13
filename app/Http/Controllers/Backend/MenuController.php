<?php
namespace App\Http\Controllers\Backend;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\MenuRequest;
class MenuController extends Controller {
    public function index(Request $request) {
        $menus = Menu::where(function($query) use ($request){
            return $query->when($request->search, function($q) use ($request){
                return $q->where('name', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(10);
        return view('admin.menus.index', compact('menus'));
    }

    public function store(MenuRequest $request) {
        // return $request->all();
        try {
            $username = auth()->user()->name;
            $request->merge(['username' => $username]);
            $dataRequest = $request->except('_token');
            Menu::create($dataRequest);
            $notification = array(
                'message' => 'تم اضافة القائمة بنجاح',
                'alert-type'    => 'success'
            );
            return redirect()->route('menus.index')->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => 'حدث خطأ ما',
                'alert-type'    => 'error'
            );
            return redirect()->route('menus.index')->with($notification);
            //return redirect()->route('menus.index')->withErrors(['error' => $e->getMessage()]);
        }
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
