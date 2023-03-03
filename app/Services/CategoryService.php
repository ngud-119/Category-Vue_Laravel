<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Repositories\Category\CategoryRepositoryImpl;

class CategoryService
{
    private CategoryRepositoryImpl $categoryRepositoryImpl;

    public function __construct(CategoryRepositoryImpl $categoryRepositoryImpl)
    {
        $this->categoryRepositoryImpl = $categoryRepositoryImpl;
    }

    public function getCategories(): Collection
    {
        return $this->categoryRepositoryImpl->getCategories();
    }
}
