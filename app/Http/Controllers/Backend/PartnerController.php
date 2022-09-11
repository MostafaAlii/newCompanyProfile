<?php
namespace App\Http\Controllers\Backend;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller {
    public function __construct() {
        $this->middleware('permission:partners_read', ['only' => ['index']]);
        $this->middleware('permission:partners_create', ['only' => ['create']]);
        $this->middleware('permission:partners_update', ['only' => ['edit']]);
        $this->middleware('permission:partners_delete', ['only' => ['destroy']]);
    }
    public function index(Request $request) {
        $partners = Partner::where(function($query) use ($request){
            return $query->when($request->search, function($q) use ($request){
                return $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('link', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(10);
        return view('admin.partner.index', compact('partners'));
    }

    public function create() {
        return view('admin.partner.create');
    }

    public function store(Request $request) {
        try{
            $request->validate([
                'name' => 'required',
                'link' => 'required|unique:partners,link',
                'image' => 'image',
                'status' => 'required|in:0,1',
            ]);
            $request_data = $request->except(['image', 'submit']);
            if ($request->image) {
                Image::make($request->image)
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path('uploads/partner_images/' . $request->image->hashName()));
                $request_data['image'] = $request->image->hashName();
            }
            Partner::create($request_data);
            return redirect()->route('partners.index')->with([
                'message' => 'تم اضافة الشريك بنجاح',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('partners.index')->with([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);
        }
    }

    public function show($id) {
        //
    }

    public function edit(Partner $partner) {
        return view('admin.partner.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner) {
        try{
            $request->validate([
                'name' => 'required',
                'link' => 'sometimes|unique:partners,link,'.$partner->id,
                'image' => 'image',
                'status' => 'sometimes|in:0,1',
            ]);
            $request_data = $request->except(['submit', 'image']);
            if ($request->image) {
                if ($partner->image != 'default.png') {
                    Storage::disk('public_uploads')->delete('/partner_images/' . $partner->image);
                }//end of inner if
                Image::make($request->image)
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('uploads/partner_images/' . $request->image->hashName()));
                $request_data['image'] = $request->image->hashName();
            }
            $partner->update($request_data);
            return redirect()->route('partners.index')->with([
                'message' => 'تم تحديث بيانات الشريك بنجاح',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('partners.index')->with([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);
        }
    }

    public function destroy(Partner $partner) {
        try {
            if ($partner->image != 'default.png') {
                Storage::disk('public_uploads')->delete('/partner_images/' . $partner->image);
            }
            $partner->delete();
            return redirect()->route('partners.index')->with([
                'message' => 'تم حذف الشريك بنجاح',
                'alert-type' => 'success'
            ]);
        } catch(\Exception $ex) {
            return redirect()->route('partners.index')->with([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);
        }
    }
}
