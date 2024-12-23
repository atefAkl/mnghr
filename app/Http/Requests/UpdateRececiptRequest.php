<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRececiptRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
      return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
      return [
        'reference'      => 'required|string|max:14',
        'breif'          => 'nullable|string|max:255',
        'notes'          => 'nullable|string|max:255'
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
        'reference.required'      => 'The reference field is required.',
        'reference.string'        => 'The reference must be a number.',
        'reference.max'           => 'The reference may not be greater than 14 number.',
  
        'breif.string'            => 'The brief  must be a string.',
        'breif.max'               => 'The brief  may not be greater than 255 characters.',

        'notes.string'            => 'The notes  must be a string.',
        'notes.max'               => 'The  notes may not be greater than 255 characters.',
  
      ];
    }
  }
  