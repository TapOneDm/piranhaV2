<?php

use yii\db\Migration;

/**
 * Class m230916_141107_add_address_table
 */
class m230916_141107_add_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE address (
                id int NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (id),
                image_file_id int NOT NULL,
                title varchar(255) NOT NULL,
                text text NOT NULL,
                yandex_url text NOT NULL,
                sort_order int NULL
            );
        ');

        $this->execute('CREATE INDEX address_file_id ON address (image_file_id);');
        $this->execute('ALTER TABLE address ADD FOREIGN KEY (image_file_id) REFERENCES file (id)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230916_141107_add_address_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230916_141107_add_address_table cannot be reverted.\n";

        return false;
    }
    */
}
