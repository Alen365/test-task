<?php

namespace App\Http\Requests\Book;

use Illuminate\Contracts\Validation\ValidationRule;

class StoreRequest extends BookRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'publish_date' => ['required', 'date:y-m-d'],
            'author_id' => ['required', 'integer', 'exists:authors,id'],
        ];
    }
}
