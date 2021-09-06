<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name'          => 'required',
            'email'         => 'required|email|unique:employees|max:255',
            'salary'        => 'required',
            'joining_date'  => 'required',
            'photo'         => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name'          => 'Name',
            'email'         => 'Email',
            'salary'        => 'Salary',
            'joining_date'  => 'Joining Date',
            'photo'         => 'Photo',
        ];
    }
}