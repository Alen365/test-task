<?php

namespace App\Http\Requests\Author;

use Illuminate\Contracts\Validation\ValidationRule;

class StoreRequest extends AuthorRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'biography' => ['required','string'],
        ];
    }
}
