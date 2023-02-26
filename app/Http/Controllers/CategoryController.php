<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Support\Collection;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): Collection
    {
        return $this->categoryService->getCategories();
    }
}
