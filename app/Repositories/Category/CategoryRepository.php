<?php

namespace App\Repositories\Category;

use Illuminate\Support\Collection;

interface CategoryRepository
{
    public function getCategories(): Collection;
}
