<?php

namespace App\Services\Category;

use Illuminate\Support\Collection;
use App\Repositories\Category\CategoryRepositoryImpl;

class CategoryServiceImpl implements CategoryService
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
