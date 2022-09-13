<?php
namespace App\Http\Requests\Backend;
use Illuminate\Foundation\Http\FormRequest;
class MenuRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        switch($this->method()) {
            case 'POST' : {
                return [
                    'name'          =>          'required|max:255|unique:menus,name',
                    'link'          =>          'required|url|unique:menus,link',
                    'username'      =>          'sometimes|nullable',
                    'sorting'       =>          'required|in:1,2,3,4,5,6,7,8,9,10|numeric|min:1|max:10|unique:menus,sorting',
                    'status'        =>          'required|boolean|in:0,1',
                ];
            }
            case 'PUT' : 
            case 'PATCH' : {
                return [
                    'name'          =>          'required|max:255|unique:menus,name,' . $this->route()->menu->id,
                    'link'          =>          'required|url|unique:menus,link,' . $this->route()->menu->id,
                    'username'      =>          'sometimes|nullable',
                    'sorting'       =>          'required|in:1,2,3,4,5,6,7,8,9,10|numeric|min:1|max:10|unique:menus,sorting,' . $this->route()->menu->id,
                    'status'        =>          'required|boolean|in:0,1',
                ];
            }
            default: break;
        }
    }

    public function messages() {
        return [
            'name.required' => 'اسم القائمة مطلوب',
            'name.max' => 'اسم القائمة يجب أن لا يزيد عن 255 حرف',
            'name.unique' => 'اسم القائمة موجود مسبقاً',
            'link.required' => 'رابط القائمة مطلوب',
            'link.url' => 'رابط القائمة غير صحيح',
            'link.unique' => 'رابط القائمة موجود مسبقاً',
            'sorting.required' => 'ترتيب القائمة مطلوب',
            'sorting.in' => 'ترتيب القائمة غير صحيح',
            'sorting.numeric' => 'ترتيب القائمة يجب أن يكون رقم',
            'sorting.min' => 'ترتيب القائمة يجب أن يكون أكبر من 0',
            'sorting.max' => 'ترتيب القائمة يجب أن يكون أقل من 11',
            'sorting.unique' => 'ترتيب القائمة موجود مسبقاً',
            'status.required' => 'حالة القائمة مطلوبة',
            'status.boolean' => 'حالة القائمة غير صحيحة',
            'status.in' => 'حالة القائمة غير صحيحة',
        ];
    }
}
