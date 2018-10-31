<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploiRequest extends FormRequest
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
            'profile' => 'min:5|string',
            'titre' => 'required|min:5',
            'contrat' => 'required|min:2|string',
            'ville' => 'required|min:3|string',
            'salaire' => 'required',
            'poste' => 'required|min:5|string',
            'entreprise' =>'required|min:5'
            //
        ];
    }
}
