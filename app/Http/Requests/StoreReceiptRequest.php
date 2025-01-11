<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReceiptRequest extends FormRequest
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
        'reception_date' => 'required|date',
        'serial'         => 'required|string|size:14',
        'serial'        => 'required|string|size:14|unique:store_receipts,serial',
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

        'serial.required'         => 'The serial field is required.',
        'serial.string'           => 'The serial must be a number.',
        'serial.max'              => 'The serial may not be greater than 14 number.',
        'serial.unique'            => 'The serial has already been taken.',
        'reception_date.required'  => 'The date field is required.',
        'reception_date.date'     => 'The reception date must be a date.',
  
        'breif.string'            => 'The brief  must be a string.',
        'breif.max'               => 'The brief  may not be greater than 255 characters.',

        'notes.string'            => 'The notes  must be a string.',
        'notes.max'               => 'The  notes may not be greater than 255 characters.',
  
      ];
    }
  }
  