<?php

use yii\db\Migration;

/**
 * Class m250207_175801_add_address_request_table
 */
class m250207_175801_add_address_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE address_request (
                id int NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (id),
                dt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                name varchar(255) NOT NULL,
                phone varchar(255) NOT NULL
            );
        ');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250207_175801_add_address_request_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250207_175801_add_address_request_table cannot be reverted.\n";

        return false;
    }
    */
}
