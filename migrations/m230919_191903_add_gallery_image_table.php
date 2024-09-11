<?php

use yii\db\Migration;

/**
 * Class m230919_191903_add_gallery_image_table
 */
class m230919_191903_add_gallery_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE gallery_image (
                id int NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (id),
                image_file_id int NOT NULL,
                title varchar(255) NOT NULL
            );
        ');

        $this->execute('CREATE INDEX gallery_image_file_id ON gallery_image (image_file_id);');
        $this->execute('ALTER TABLE gallery_image ADD FOREIGN KEY (image_file_id) REFERENCES file (id)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230919_191903_add_gallery_image_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230919_191903_add_gallery_image_table cannot be reverted.\n";

        return false;
    }
    */
}
