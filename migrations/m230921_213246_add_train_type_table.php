<?php

use yii\db\Migration;

/**
 * Class m230921_213246_add_train_type_table
 */
class m230921_213246_add_train_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE train (
                id int NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (id),
                image_file_id int NOT NULL,
                title varchar(255) NOT NULL,
                text text NOT NULL,
                sort_order int NULL
            );
        ');

        $this->execute('CREATE INDEX train_file_id ON train (image_file_id);');
        $this->execute('ALTER TABLE train ADD FOREIGN KEY (image_file_id) REFERENCES file (id)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230921_213246_add_train_type_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230921_213246_add_train_type_table cannot be reverted.\n";

        return false;
    }
    */
}
