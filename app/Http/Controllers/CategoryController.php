<?php

namespace App\Http\Controllers;

use App\Services\Category\CategoryServiceImpl;
use Illuminate\Support\Collection;

class CategoryController extends Controller
{
    protected CategoryServiceImpl $categoryServiceImpl;

    public function __construct(CategoryServiceImpl $categoryServiceImpl)
    {
        $this->categoryServiceImpl = $categoryServiceImpl;
    }

    public function index(): Collection
    {
        return $this->categoryServiceImpl->getCategories();
    }
}
