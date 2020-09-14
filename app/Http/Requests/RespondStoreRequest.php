<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RespondStoreRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'resume' => 'file|mimes:doc,txt,docx,pdf'
        ];
    }
}
