<?php

use yii\db\Migration;

/**
 * Class m230909_155419_add_price_table
 */
class m230909_155419_add_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE price (
                id int NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (id),
                price_name varchar(255) NOT NULL,
                cost varchar(255) NOT NULL,
                sort_order int NULL
            );
        ');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230909_155419_add_price_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230909_155419_add_price_table cannot be reverted.\n";

        return false;
    }
    */
}
