<?php

namespace App\Services;

use App\Models\User;
use App\Validators\UserValidator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


/**
 * Class UserService
 * @package App\Services
 */
class UserService extends BaseService
{
    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return User::class;
    }

    /**
     * @return string
     */
    protected function getValidatorClass(): string
    {
        return UserValidator::class;
    }

    /**
     * @return \App\Validators\BaseValidator|null
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param $data
     * @return array
     */
    public function createWithFields($data)
    {
        $fields = [];
        $userData = [];
        $fieldsData = [];
        foreach ($data as $key => $value) {
            if (strpos($key, 'field_') === 0) {
                $fields[str_replace('field_', '', $key)] = $value;
            } else {
                $userData[$key] = $value;
            }
        }

        DB::beginTransaction();
        try {

            $userData['email_verification_token'] = Str::random(32);

            if (empty($userData['role'])) {
                $userData['role'] = \ConstUserRoles::TYPE_USER;
            }

            //TODO: Delete on production
            $userData['email_verified_at'] = Carbon::now();

            $user = User::create($userData);
            foreach ($fields as $fieldKey => $value) {
                $fieldId = '';

                for ($i = 0; $i < strlen($fieldKey); $i++) {
                    if (is_numeric($fieldKey[$i])) {
                        $fieldId .= $fieldKey[$i];
                    } else {
                        break;
                    }
                }

                $fieldsData[] = [
                    'user_id' => $user->id,
                    'field_id' => $fieldId,
                    'value' => $value
                ];

            }

            if (!empty($fieldsData)) {
                $data =  UserField::insert($fieldsData);
            }
            DB::commit();

            return $data;

        } catch (\Exception $exception) {
            DB::rollBack();
            report($exception);
            return [
                'success' => 0,
                'message' => $exception->getMessage()
            ];
        }

    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getProfileData()
    {

        $user = Auth::user();
        $fieldService = new FieldService();

        $fields = $fieldService->getMainFields($user->id);

        return [$user, $fields];
    }

    /**
     * @param $fields
     */
    public function updateProfile($data)
    {
        $user = Auth::user();
        $fieldServices = new FieldService();
        $fields = $fieldServices->getMainFields($user->id);

        if (empty($fields)) {
            return [
                "success" => FALSE,
                "message" => "Not found!"
            ];
        }

        foreach ($fields as $field)
        {
            $value = $data[$field->name];

            if ($field->type === \ConstFieldTypes::CHECKBOX && in_array($value, [\ConstFieldBoolValue::TRUE, \ConstFieldBoolValue::FALSE])) {
                $value = $value === \ConstFieldBoolValue::TRUE;
            } else if ($field->form_field->options->isNotEmpty()) {
                $option = $field->form_field->options->firstWhere('id', $value);

                if (!empty($option)) {
                    $value = $option->pivot->value;
                }
            }

            UserField::updateOrCreate([
                "user_id" => $user->id,
                "field_id" => $field->id,
            ], [
                "value" => $value,
            ]);
        }

        return [
            "success" => TRUE,
            "message" => "Successfully updated",
        ];

    }

    /**
     * Change user password
     *
     * @param $data
     * @return array
     */
    public function changePassword($data)
    {
        $user = Auth::user();

        if (Hash::check($data["old_password"], $user->password)) {
            $user->fill([
                'password' => Hash::make($data["password"]),
            ])->save();

            return [
                "success" => TRUE,
                "message" => [
                    "type" => "success",
                    "text" => "Password successfully changed",
                ],
            ];
        }

        return [
            "success" => FALSE,
            "message" => [
                "type" => "error",
                "text" => "Incorrect old password!",
            ],
        ];
    }

}
