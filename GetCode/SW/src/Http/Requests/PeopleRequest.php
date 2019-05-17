<?php

namespace GetCode\SW\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class PeopleRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name'         => 'required|string',
            'height'       => 'required|numeric',
            'mass'         => 'required|numeric',
            'hair_color'   => 'required|string',
            'birth_year'   => 'required|string',
            'gender'       => 'required|string|in:male,female,n/a',
            'homeworld_id' => 'required|integer|exists:home_worlds,id',
            'created'      => 'required|date_format: "Y-m-d"',
            'url'          => 'required|string',
            'films'        => 'array',
            'films.*.id'   => 'integer|exists:films,id'
        ];
    }
}