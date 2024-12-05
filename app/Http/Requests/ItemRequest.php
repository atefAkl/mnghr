<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
      'barcode' => 'required|string|max:14',
      'name' => 'required|string|max:50',
      'serial' => 'nullable|string|size:14',
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
      'barcode.required' => 'The barcode field is required.',
      'barcode.string' => 'The barcode must be a string.',
      'barcode.max' => 'The barcode may not be greater than 14 characters.',

      'name.required' => 'The name field is required.',
      'name.string' => 'The name must be a string.',
      'name.max' => 'The name may not be greater than 50 characters.',

      'serial.string' => 'The serial must be a string.',
      'serial.size' => 'The serial must be exactly 14 characters.',

      'breif.string' => 'The brief description must be a string.',
      'breif.max' => 'The brief description may not be greater than 255 characters.',

    ];
  }
}
