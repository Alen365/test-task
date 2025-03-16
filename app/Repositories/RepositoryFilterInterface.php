<?php

namespace App\Repositories;

interface RepositoryFilterInterface
{
    public function filter(array $filters, int $page, int $limit);
}
