<?php


namespace App\Http\Controllers\Admin;


use App\Services\Admin\CategoryService;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Admin
 */
class CategoryController extends BaseAdminController
{

    /**
     * CategoryController constructor.
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->baseService = $categoryService;
    }

}
