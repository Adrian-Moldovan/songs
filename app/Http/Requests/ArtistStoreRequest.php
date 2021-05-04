<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistStoreRequest extends FormRequest
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
        switch($this->method()){
            case 'POST':
                $this->rules['name'][] = 'unique:artists';
                break;

            case 'PUT':
                $this->rules['name'][] = 'unique:artists,name,' . $this->artist->id;
                break;

            default:
                die('request method not specifiedin validation: ' . $this->method());
        }
        return $this->rules;
    }
}
