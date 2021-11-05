<?php


namespace App\Http\Controllers\Admin;


use App\Services\Admin\ProductService;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers\Admin
 */
class ProductController extends BaseAdminController
{
    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->baseService = $productService;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function paginated(Request $request) : array
    {
        return parent::paginated($request);
    }

    /**
     * @return array
     */
    public function totalCount() : array
    {
        $productsCount = $this->baseService->getProductsTotal();
        return $this->makeResponse($productsCount);
    }

    /**
     * @return mixed
     */
    public function categoryTree()
    {
        return $this->makeResponse($this->baseService->categoryTree());
    }

}
