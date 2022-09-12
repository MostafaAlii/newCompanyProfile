<?php
namespace App\Http\Controllers\Backend;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SettingController extends Controller {
    public function index() {
        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('admin.setting.index', $setting);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request) {
        try{
            $info = $request->except('_token', '_method', 'site_logo', 'site_favicon');
            foreach ($info as $key=> $value){
                Setting::where('key', $key)->update(['value' => $value]);
            }
            if($request->hasFile('site_logo')){
                $file = $request->file('site_logo');
                //$file_name = time() . '_logo.' . $file->getClientOriginalExtension();
                $file_name = md5($file->getClientOriginalName() . time()) . '_logo.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/setting_images'), $file_name);
                Setting::where('key', 'site_logo')->update(['value' => $file_name]);
                
            }
            if($request->hasFile('site_favicon')){
                $file = $request->file('site_favicon');
                // hashed filename of image
                $file_name = md5($file->getClientOriginalName() . time()) . '_favicon.' . $file->getClientOriginalExtension();
                //$file_name = time() . '_favicon.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/setting_images'), $file_name);
                Setting::where('key', 'site_favicon')->update(['value' => $file_name]);
                
            }
            return redirect()->route('settings.index')->with([
                'message' => 'تم تحديث الاعدادات بنجاح',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('settings.index')->with([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);
        }
    }

    public function destroy($id) {
        //
    }
}
