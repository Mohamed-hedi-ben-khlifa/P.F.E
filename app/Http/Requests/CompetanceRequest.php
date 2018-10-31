<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompetanceRequest extends FormRequest
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
          'c1' => 'required|string|min:2',
          'c2' => 'required|string|min:2',
          'c3' => 'required|string|min:2',
          'c4' => 'required|string|min:2',
          'p1' => 'required|numeric',
          'p2' => 'required|numeric',
          'p3' => 'required|numeric',
          'p4' => 'required|numeric',
          'p5' => 'required|numeric',
          'p6' => 'required|numeric',
          'p7' => 'required|numeric',
          'p8' => 'required|numeric',
          'p9' => 'required|numeric',
          'p10' => 'required|numeric',
          'p11' => 'required|numeric',
          'p12' => 'required|numeric',
        ];
    }
}
