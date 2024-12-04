<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class itemCategoryRequest extends FormRequest
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
    
      'name' => 'required|string|max:50',
      'breif' => 'nullable|string|max:255'
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function messages()
  {
    return [
      

      'name.required' => 'The name field is required.',
      'name.string' => 'The name must be a string.',
      'name.max' => 'The name may not be greater than 50 characters.',

      'breif.string' => 'The brief description must be a string.',
      'breif.max' => 'The brief description may not be greater than 255 characters.',

    ];
  }
}
