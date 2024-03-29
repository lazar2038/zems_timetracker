<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['string', 'nullable'],
            'project_id' => ['integer', 'nullable']
        ];
    }


    protected function prepareForValidation()
    {
        if($this->project_id == 0) {
            $this->merge(['project_id' => NULL]);
        }
    }


}
