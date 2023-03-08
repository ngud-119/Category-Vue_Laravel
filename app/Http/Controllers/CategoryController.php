<?php

namespace App\Http\Controllers;

use App\Services\Category\CategoryServiceImpl;
use Exception;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    protected CategoryServiceImpl $categoryServiceImpl;

    public function __construct(CategoryServiceImpl $categoryServiceImpl)
    {
        $this->categoryServiceImpl = $categoryServiceImpl;
    }

    public function index(): JsonResponse
    {
        $result = ['status' => 200];
        try {
            $result['categories'] = $this->categoryServiceImpl->getCategories();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
