<?php

use app\models\BaseStatus;
use app\models\User;
use yii\db\Migration;

/**
 * Class m180927_103257_init_data
 */
class m180927_103257_init_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $model = new User();
        $model->id = 1;
        $model->fullname = "Администратор";
        $model->email = "admin@example.local";
        $model->phone = "55555555555";
        $model->created = time();
        $model->updated = time();
        $model->status = BaseStatus::STATUS_ACTIVE;
        $model->setPassword(123456);
        print_r($model->save());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //$model = User::findOne(1);
        //$model->delete();
    }


}
