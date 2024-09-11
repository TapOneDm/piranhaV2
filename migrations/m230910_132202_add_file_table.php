<?php

use yii\db\Migration;

/**
 * Class m230910_132202_add_file_table
 */
class m230910_132202_add_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE file (
                id int NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (id),
                dt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                name varchar(255) NOT NULL,
                path text NOT NULL
            );
        ');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230910_132202_add_file_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230910_132202_add_file_table cannot be reverted.\n";

        return false;
    }
    */
}
