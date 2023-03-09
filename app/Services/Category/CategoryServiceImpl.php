<?php

namespace App\Services\Category;

use App\Models\Category;
use Illuminate\Support\Collection;
use App\Repositories\Category\CategoryRepository;

class CategoryServiceImpl implements CategoryService
{
    private CategoryRepository $categoryRepositoryImpl;

    public function __construct(CategoryRepository $categoryRepositoryImpl)
    {
        $this->categoryRepositoryImpl = $categoryRepositoryImpl;
    }

    public function getCategories(): Collection
    {
        return $this->categoryRepositoryImpl->getCategories();
    }

    public function getCategoryById(int $categoryId): Category
    {
        return $this->categoryRepositoryImpl->getCategoryById($categoryId);
    }
}
