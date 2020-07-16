<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=> 'required|unique:posts|max:255',
            'body'=> 'required',
        ];
    }
}
//Sau do gan lop xac thuc vao file controller StoreBlogPost $request kem thoe name space cua form request su dung vao controller use App\Http\Request\StoreBlogPost

