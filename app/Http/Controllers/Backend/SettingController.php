<?php
namespace App\Http\Controllers\Backend;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SettingController extends Controller {
    public function index() {
        $collection = Setting::all();
        $setting =$setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('admin.setting.index' , compact('setting'));
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
            $info = $request->except('_token', '_method', 'site_logo', 'site_favicon', 'home_cover');
            foreach ($info as $key=> $value){
                Setting::where('key', $key)->update(['value' => $value]);
            }
            if($request->hasFile('site_logo')){
                $file = $request->file('site_logo');
                $file_name = md5($file->getClientOriginalName() . time()) . '_logo.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/setting_images'), $file_name);
                Setting::where('key', 'site_logo')->update(['value' => $file_name]);   
            }
            if($request->hasFile('home_cover')){
                $file = $request->file('home_cover');
                $file_name = md5($file->getClientOriginalName() . time()) . '_home_cover.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/setting_images'), $file_name);
                Setting::where('key', 'home_cover')->update(['value' => $file_name]);   
            }
            if($request->hasFile('site_favicon')){
                $file = $request->file('site_favicon');
                $file_name = md5($file->getClientOriginalName() . time()) . '_favicon.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/setting_images'), $file_name);
                Setting::where('key', 'site_favicon')->update(['value' => $file_name]);
            }
            
            $notification = array(
                'message' => 'تم تحديث الاعدادات بنجاح',
                'alert-type' => 'success'
            );
            return redirect()->route('settings.index')->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => 'حدث خطأ ما',
                'alert-type'    => 'error'
            );
            return redirect()->route('settings.index')->with($notification);
        }
    }

    public function destroy($id) {
        //
    }
}
