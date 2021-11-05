<?php

namespace App\Validators\Admin;

/**
 * Class ProductValidator
 * @package App\Validators\Admin
 */
class ProductValidator extends BaseAdminValidator
{

    /**
     * @return array
     */
    public function validateCreate():array
    {
        return $this->validateBase();
    }

    /**
     * @return array
     */
    public function validateUpdate():array
    {
        return $this->validateBase();
    }

    /**
     * @return string[]
     */
    public function validateBase(): array
    {
        return [
            'category_id' => 'required|int|exists:categories,id',
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ];
    }
}
