<?php

namespace App\Services\Category;

use Illuminate\Support\Collection;

interface CategoryService
{
    /**
     * Get all categories.
     *
     * @return Collection
     */
    public function getCategories(): Collection;
}
