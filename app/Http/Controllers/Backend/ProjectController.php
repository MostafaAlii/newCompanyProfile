<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Category, Project};
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProjectRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
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
        $categories = Category::whereStatus(1)->get(['id','name']);
        return view('admin.project.create', compact('categories'));
    }

    public function store(ProjectRequest $request) {
        try {
            //DB::beginTransactions();
            $input['name'] = $request->name;
            $input['status'] = $request->status;
            $input['description'] = $request->description;
            $input['link'] = $request->link;
            $input['category_id'] = $request->category_id;
            $project = Project::create($input);
            if($request->images && count($request->images) > 0) {
                $i = 1;
                foreach($request->images as $image) {
                    $file_name = $project->slug . '_' . time() . '_' . $i . '.' . $image->getClientOriginalExtension();
                    $file_size = $image->getSize();
                    $file_type = $image->getMimeType();
                    $path = public_path('images/projects/' . $file_name);
                    Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($path, 100);
    
                    $project->media()->create([
                        'file_name' => $file_name,
                        'file_size' => $file_size,
                        'file_type' => $file_type,
                        'file_status' => true,
                        'file_sort' => $i,
                    ]);
                    $i++;
                }
            }
            //DB::commit();
            return redirect()->route('projects.index')->with([
                'message' => 'تم اضافة المشروع بنجاح',
                'alert-type' => 'success'
            ]);
        } catch(\Exception $ex) {
            //DB::rollBack();
            return redirect()->route('projects.index')->with([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);
        }
    }

    public function edit(Project $project) {
        $categories = Category::whereStatus(1)->get(['id','name']);
        return view('admin.project.edit', compact('project', 'categories'));
    }

    public function update(ProjectRequest $request, Project $project) {
        try{
            $input['name'] = $request->name;
            $input['status'] = $request->status;
            $input['description'] = $request->description;
            $input['link'] = $request->link;
            $input['category_id'] = $request->category_id;
            $project->update($input);
            // images
            if($request->images && count($request->images) > 0) {
                $i = $project->media()->count() + 1;
                foreach($request->images as $image) {
                    $file_name = $project->slug . '_' . time() . '_' . $i . '.' . $image->getClientOriginalExtension();
                    $file_size = $image->getSize();
                    $file_type = $image->getMimeType();
                    $path = public_path('images/projects/' . $file_name);
                    Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($path, 100);
    
                    $project->media()->create([
                        'file_name' => $file_name,
                        'file_size' => $file_size,
                        'file_type' => $file_type,
                        'file_status' => true,
                        'file_sort' => $i,
                    ]);
                    $i++;
                }
            }
            return redirect()->route('projects.index')->with([
                'message' => 'تم تحديث المشروع بنجاح',
                'alert-type' => 'success'
            ]);
        } catch(\Exception $ex) {
            return redirect()->route('projects.index')->with([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);
        }
    }

    public function destroy(Project $project) {
        try {
            if($project->media()->count() > 0) {
                foreach($project->media as $media) {
                    $path = public_path('images/projects/' . $media->file_name);
                    if(File::exists($path)) {
                        unlink($path);
                    }
                    $media->delete();
                }
            }
            $project->delete();
            return redirect()->route('projects.index')->with([
                'message' => 'تم حذف المشروع بنجاح',
                'alert-type' => 'success'
            ]);
        } catch(\Exception $ex) {
            return redirect()->route('projects.index')->with([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);
        }  
    }

    public function deleteMedia(Request $request) {
        try {
            $media = $request->media;
            $project = Project::findOrFail($request->project_id);
            $imgFileName = $project->media()->whereId($media)->first();
            if(File::exists(public_path('images/projects/' . $imgFileName->file_name))) {
                unlink(public_path('images/projects/' . $imgFileName->file_name));
            }
            $imgFileName->delete();
            return response()->json([
                'message' => 'تم حذف الصورة بنجاح',
                'alert-type' => 'success'
            ]);
        } catch(\Exception $ex) {
            return response()->json([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);
        }
    }
}
