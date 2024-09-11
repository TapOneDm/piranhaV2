<?php

use yii\db\Migration;

/**
 * Class m230921_185751_add_footer_table
 */
class m230921_185751_add_footer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE footer (
                id int NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (id),
                requisites text NOT NULL,
                contacts text NOT NULL,
                social_links json NULL
            );
        ');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230921_185751_add_footer_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230921_185751_add_footer_table cannot be reverted.\n";

        return false;
    }
    */
}
