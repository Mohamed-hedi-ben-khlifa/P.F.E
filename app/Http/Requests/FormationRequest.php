<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationRequest extends FormRequest
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
          'titre' => 'required|string|min:5',
          'socite' => 'required|string|min:5',
          'description' => 'required|string|min:5',
          'date_d' => 'required',
          'date_f' => 'required',
        ];
    }
}
