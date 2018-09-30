<?php

use yii\db\Migration;
use floor12\user\models\UserStatus;
use floor12\user\models\User;
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

        // create first user
        $model = new User();
        $model->id = 1;
        $model->fullname = "Администратор";
        $model->email = "admin@example.local";
        $model->phone = "55555555555";
        $model->created = time();
        $model->updated = time();
        $model->status = UserStatus::STATUS_ACTIVE;
        $model->setPassword(123456);
        $model->save();


        // load demo pages and news
        $this->compact = true;


        try {
            $this->execute(file_get_contents(Yii::getAlias("@app/migrations/demo_data/dump.sql")), []);
        } catch (Exception $e) {
            echo "Error import into database" . PHP_EOL;

        }

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
