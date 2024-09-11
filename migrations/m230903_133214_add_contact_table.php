<?php

use yii\db\Migration;

/**
 * Class m230903_133214_add_contact_table
 */
class m230903_133214_add_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE contact (
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
        echo "m230903_133214_add_contact_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230903_133214_add_contact_table cannot be reverted.\n";

        return false;
    }
    */
}
