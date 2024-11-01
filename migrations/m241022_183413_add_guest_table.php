<?php

use yii\db\Migration;

/**
 * Class m241022_183413_add_guest_table
 */
class m241022_183413_add_guest_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE guest (
                id int NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (id),
                dt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                source varchar(255) NOT NULL,
                counter int NULL
            );
        ');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241022_183413_add_guest_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241022_183413_add_guest_table cannot be reverted.\n";

        return false;
    }
    */
}
