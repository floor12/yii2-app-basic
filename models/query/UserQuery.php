<?php

namespace app\models\query;

use app\models\BaseStatus;
use app\models\User;

/**
 * This is the ActiveQuery class for [[User]].
 *
 * @see User
 */
class UserQuery extends \yii\db\ActiveQuery
{
    /**
     * @return UserQuery
     */
    public function active()
    {
        return $this->andWhere(['status' => BaseStatus::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     * @return User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }


    /**
     * @param $email
     * @return User|null
     */
    public static function findByEmail($email)
    {
        return User::findOne(['email' => $email, 'status' => BaseStatus::STATUS_ACTIVE]);
    }

    public static function findByPasswordResetToken($token)
    {
        if (!User::isPasswordResetTokenValid($token)) {
            return null;
        }

        return User::findOne([
            'password_reset_token' => $token,
            'status' => BaseStatus::STATUS_ACTIVE,
        ]);
    }
}
