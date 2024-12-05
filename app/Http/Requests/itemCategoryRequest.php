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
    
      'cat_name' => 'required|string|max:50',
      'cat_brief' => 'nullable|string|max:255'
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
      

      'cat_name.required' => 'The name field is required.',
      'cat_name.string' => 'The name must be a string.',
      'cat_name.max' => 'The name may not be greater than 50 characters.',

      'cat_brief.string' => 'The brief description must be a string.',
      'cat_brief.max' => 'The brief description may not be greater than 255 characters.',

    ];
  }
}
