<?php
namespace frontend\models;

use yii\base\Model;

/**
 * register form
 *
 * Class RegisterForm
 * @package frontend\models
 */
class RegisterForm extends Model
{
    public $mobile;
    public $code;
    public $password;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['mobile', 'filter', 'filter' => 'trim'],
            ['mobile', 'required'],
            ['mobile', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This mobile has already been taken.'],
            ['mobile', 'string', 'min' => 11, 'max' => 11],

            ['code', 'filter', 'filter' => 'trim'],
            ['code', 'required'],
            ['code', 'integer', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],


            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
}