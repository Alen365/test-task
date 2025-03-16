<?php

namespace App\DTOs\Library;

use App\DTOs\BaseDTO;

class BookDTO extends BaseDTO
{
    public function __construct(
        public string $title,
        public string $published_date,
        public int    $author_id,
    )
    {
    }
}
