<?php

use yii\db\Migration;

/**
 * Class m240914_142128_add_sign_table
 */
class m240914_142128_add_sign_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE sign (
                id int NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (id),
                dt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                name varchar(255) NOT NULL,
                phone varchar(255) NOT NULL,
                train_type mediumtext NOT NULL
            );
        ');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240914_142128_add_sign_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240914_142128_add_sign_table cannot be reverted.\n";

        return false;
    }
    */
}
