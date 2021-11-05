<?php


namespace App\Services\Admin;


use App\Models\Category;
use App\Validators\Admin\CategoryValidator;

/**
 * Class BlockCategoryService
 * @package App\Services\Admin
 */
class CategoryService extends BaseAdminService
{
    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Category::class;
    }

    /**
     * @return string
     */
    protected function getValidatorClass(): string
    {
        return CategoryValidator::class;
    }

}
