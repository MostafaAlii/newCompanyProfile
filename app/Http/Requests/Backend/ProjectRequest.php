<?php
namespace App\Http\Requests\Backend;
use Illuminate\Foundation\Http\FormRequest;
class ProjectRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        switch($this->method()) {
            case 'POST' : {
                return [
                    'name'          =>          'required|max:255',
                    'description'   =>          'required',
                    'link'          =>          'sometimes|required',
                    'images'        =>          'required',
                    'images.*'      =>          'mimes:jpg,png,jpeg|max:3000',
                    'category_id'   =>          'required|exists:categories,id',
                    'status'        =>          'required',
                ];
            }
            case 'PUT' : 
            case 'PATCH' : {
                return [
                    'name'          =>          'required|max:255',
                    'description'   =>          'required',
                    'link'          =>          'sometimes|required',
                    'images'        =>          'nullable',
                    'images.*'      =>          'mimes:jpg,png,jpeg|max:3000',
                    'category_id'   =>          'required|exists:categories,id',
                    'status'        =>          'required',
                ];
            }
            default: break;
        }
    }
}
