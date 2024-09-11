<?php

use yii\db\Migration;

/**
 * Class m230916_131243_add_review_table
 */
class m230916_131243_add_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE review (
                id int NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (id),
                image_file_id int NOT NULL,
                name varchar(255) NOT NULL,
                status varchar(255) NOT NULL,
                review_text text NOT NULL,
                sort_order int NULL
            );
        ');

        $this->execute('CREATE INDEX review_file_id ON review (image_file_id);');
        $this->execute('ALTER TABLE review ADD FOREIGN KEY (image_file_id) REFERENCES file (id)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230916_131243_add_review_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230916_131243_add_review_table cannot be reverted.\n";

        return false;
    }
    */
}
