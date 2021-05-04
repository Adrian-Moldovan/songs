<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreStoreRequest extends FormRequest
{

    private $rules = [
        'name' => ['required','min:1','max:255']
    ];

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
        switch ($this->method()) {
            case 'POST':
                $this->rules['name'][] = 'unique:genres';
                break;

            case 'PUT':
                $this->rules['name'][] = 'unique:genres,name,' . $this->genre->id;
                break;
            
            default:
                die('request method not specified in validation: ' . $this->method());
                break;
        }

        return $this->rules;
    }
}
