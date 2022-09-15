<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuInfo;
class MenuInfoController extends Controller {
    /**
     * update menu info by menu id and i send menu id in hidden input field in modal
     * using CreateOrUpdate method
     */
    public function update(Request $request) {
        $menu_id = $request->menu_id;
        $menu_info = MenuInfo::where('menu_id', $menu_id)->first();
        if ($menu_info) {
            $menu_info->update($request->all());
        } else {
            MenuInfo::create($request->all());
        }
        return response()->json(['success' => 'Menu Info Updated Successfully']);
    }
}
