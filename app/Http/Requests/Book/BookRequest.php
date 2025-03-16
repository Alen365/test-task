<?php

namespace App\Http\Requests\Book;

use App\DTOs\Library\BookDTO;
use App\Http\Requests\ConvertsToDtoInterface;
use Illuminate\Foundation\Http\FormRequest;

abstract class BookRequest extends FormRequest implements ConvertsToDtoInterface
{
    public function toDTO(): BookDTO
    {
        return new BookDTO(
            title: $this->validated('title'),
            published_date: $this->validated('publish_date'),
            author_id: $this->validated('author_id'),
        );
    }
}
