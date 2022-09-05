<?php
namespace App\Http\Requests\Backend;
use Illuminate\Foundation\Http\FormRequest;
class CategoryRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        switch($this->method()) {
            case 'POST' : {
                return [
                    'name'          =>          'required|max:255|unique:categories,name',
                    'status'        =>          'required',
                ];
            }
            case 'PUT' : 
            case 'PATCH' : {
                return [

                ];
            }
            default: break;
        }
        /********* */
    }
}
