<?php

namespace App\Validators\Admin;

/**
 * Class AuthValidator
 * @package App\Validators\Admin
 */
class AuthValidator extends BaseAdminValidator
{
    /**
     * @return array
     */
    public function validateCreate(): array
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ];

        return $this->addRuleFields($rules);
    }


    public function validateLogin(): array
    {
        return [
            'email' => 'required|string|email:filter|exists:users,email',
            'password' => 'required|string'
        ];
    }

    /**
     * Validate user password change request
     *
     * @return string[]
     */
    public function validateChangePassword(): array
    {
        return [
            'old_password' => 'required',
            'password' => 'confirmed|min:5|different:old_password',
        ];
    }
}
