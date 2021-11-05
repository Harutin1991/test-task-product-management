<?php


namespace App\Services\Admin;


use App\Models\Product;
use App\Models\Category;
use App\Validators\Admin\ProductValidator;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductService
 * @package App\Services\Admin
 */
class ProductService extends BaseAdminService
{
    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Product::class;
    }

    /**
     * @return string
     */
    protected function getValidatorClass(): string
    {
        return ProductValidator::class;
    }

    /**
     * @return mixed
     */
    public function categoryTree()
    {
        return Category::all();
    }

    /**
     * @param array $params
     * @return Object
     */
    public function paginated($params = []): object
    {
        return parent::paginated(['with' => 'category']);
    }

    public function getProductsTotal()
    {
        return parent::getTotalsCount();
    }

    /**
     * @param $id
     * @param null $relations
     * @return object
     */
    public function getSingle($id, $relations = null): object
    {
        return parent::getSingle($id, ['category']); // TODO: Change the autogenerated stub
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        DB::beginTransaction();
        $product = false;
        try {
            $product = parent::create($data);
        } catch (\Exception $e) {
            DB::rollBack();
        }

        DB::commit();

        return $product;
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        DB::beginTransaction();
        $product = false;
        try {
            $product = parent::update($id, $data);
        } catch (\Exception $e) {

            DB::rollBack();
        }

        DB::commit();
        return $product;
    }

    /**
     * @param array $insertData
     * @return mixed
     */
    public function bulkCreate($insertData = [])
    {
        $this->makeModel();
        return $this->model->insert($insertData);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $deleted = false;
        DB::beginTransaction();
        try {
            $deleted = parent::delete($id);
        } catch (\Exception $e) {
            DB::rollBack();
        }

        DB::commit();
        return $deleted;
    }

}
