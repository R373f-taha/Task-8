<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class blogRequeswtStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

    return Auth::check()&&Auth::user()->password='yes_we_can';// i put who can acsess  to here in the web page

}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'title'=>'string|required|max:20|min:5',
           'content'=>'string|required',
           'image'=>'nullable|required|mimes:png,jpg,gif,jpeg,jfif|max:2048'
        ];
    }
}
