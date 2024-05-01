<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Http\Requests\Categories\StoreCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * @param CategoryService $categoryService
     */
    public function __construct(
        CategoryService $categoryService
    ){
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->index();

        return view('admins.categories.index', compact('categories'));
    }

    public function create(StoreCategoryRequest $request)
    {
        $response = $this->categoryService->create($request->all());
        if ($response['status']) {
            return redirect()->back()->with('success', 'Create category successfully!');
        }

        return redirect()->back()->with('error', 'Create category error!');
    }

    public function detail($id)
    {
        $category = $this->categoryService->detail($id);

        return $category;
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $response = $this->categoryService->update($request->all(), $id);
        if ($response['status']) {
            return redirect()->back()->with('success', 'Update category successfully!');
        }

        return redirect()->back()->with('error', 'Update category error!');
    }

    public function delete($id)
    {
        $response = $this->categoryService->delete($id);
        if ($response['status']) {
            return redirect()->back()->with('success', 'delete category successfully!');
        }

        return redirect()->back()->with('error', 'delete category error!');
    }
}
