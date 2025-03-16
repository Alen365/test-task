<?php

namespace App\DTOs\Library;

use App\DTOs\BaseDTO;

class AuthorDTO extends BaseDTO
{
    public function __construct(
        public string $name,
        public string $biography
    )
    {
    }
}
