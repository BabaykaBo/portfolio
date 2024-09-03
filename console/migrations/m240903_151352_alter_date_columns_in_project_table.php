<?php

use yii\db\Migration;

/**
 * Class m240903_151352_alter_date_columns_in_project_table
 */
class m240903_151352_alter_date_columns_in_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn("project","start_date", 'date');
        $this->alterColumn("project","end_date", 'date');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn("project","start_date", 'integer');
        $this->alterColumn("project","end_date", 'integer');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240903_151352_alter_date_columns_in_project_table cannot be reverted.\n";

        return false;
    }
    */
}
