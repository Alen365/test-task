<?php

namespace App\Http\Requests;

use App\DTOs\DTOInterface;

interface ConvertsToDtoInterface
{
    public function toDto(): DTOInterface;
}
