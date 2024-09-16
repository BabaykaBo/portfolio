<?php

use yii\db\Migration;

/**
 * Class m240916_130301_add_new_rbac
 */
class m240916_130301_add_new_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $createUsers = $auth->createPermission('createUsers');
        $createUsers->description = 'Create Users.';
        $auth->add($createUsers);

        $admin = $auth->getRole('admin');
        $auth->addChild($admin, $createUsers);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $createUsers = $auth->getPermission('createUsers');
        $auth->remove($createUsers);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240916_130301_add_new_rbac cannot be reverted.\n";

        return false;
    }
    */
}
