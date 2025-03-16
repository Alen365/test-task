<?php

namespace App\DTOs;

class BaseDTO implements DTOInterface
{
    public function toArray(): array
    {
        return (array)$this;
    }
}
