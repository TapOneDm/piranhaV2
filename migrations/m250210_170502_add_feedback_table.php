<?php

use yii\db\Migration;

/**
 * Class m250210_170502_add_feedback_table
 */
class m250210_170502_add_feedback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
        CREATE TABLE feedback (
            id int NOT NULL AUTO_INCREMENT,
            PRIMARY KEY (id),
            dt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            phone varchar(255) NOT NULL,
            comment TEXT NOT NULL
        );
    ');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250210_170502_add_feedback_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250210_170502_add_feedback_table cannot be reverted.\n";

        return false;
    }
    */
}
