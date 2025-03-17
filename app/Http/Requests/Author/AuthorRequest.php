<?php

namespace App\Http\Requests\Author;

use App\DTOs\Library\AuthorDTO;
use App\Http\Requests\ConvertsToDtoInterface;
use Illuminate\Foundation\Http\FormRequest;

abstract class AuthorRequest extends FormRequest implements ConvertsToDtoInterface
{
    public function toDto(): AuthorDTO
    {
        return new AuthorDTO(
            name: $this->validated('name'),
            biography: $this->validated('biography'),
        );
    }
}
