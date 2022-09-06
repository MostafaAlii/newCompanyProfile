<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
class ProjectController extends Controller {
    public function index() {
        $projects = Project::with('category', 'firstMedia')
        ->when(request()->keyword != null, function ($query){
            $query->search(request()->keyword);
        })
        ->when(request()->status != null, function ($query){
            $query->whereStatus(request()->status);
        })
        ->orderBy(request()->sort_by ?? 'id', request()->order_by ?? 'desc')
        ->paginate(request()->limit_by ?? 10);
        return view('admin.project.index', compact('projects'));
    }

    public function create() {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
