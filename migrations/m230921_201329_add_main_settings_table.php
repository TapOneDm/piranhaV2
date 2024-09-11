<?php

use yii\db\Migration;

/**
 * Class m230921_201329_add_main_settings_table
 */
class m230921_201329_add_main_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE common (
                id int NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (id),
                image_file_id int NOT NULL,
                form_text text NOT NULL
            );
        ');

        $this->execute('CREATE INDEX common_banner_file_id ON common (image_file_id);');
        $this->execute('ALTER TABLE common ADD FOREIGN KEY (image_file_id) REFERENCES file (id)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230921_201329_add_main_settings_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230921_201329_add_main_settings_table cannot be reverted.\n";

        return false;
    }
    */
}
