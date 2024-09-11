<?php

use yii\db\Migration;

/**
 * Class m230921_211150_add_about_table
 */
class m230921_211150_add_about_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE about (
                id int NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (id),
                image_file_id int NOT NULL,
                text text NOT NULL
            );
        ');

        $this->execute('CREATE INDEX about_banner_file_id ON about (image_file_id);');
        $this->execute('ALTER TABLE about ADD FOREIGN KEY (image_file_id) REFERENCES file (id)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230921_211150_add_about_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230921_211150_add_about_table cannot be reverted.\n";

        return false;
    }
    */
}
