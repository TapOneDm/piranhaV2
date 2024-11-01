<?php

use yii\db\Migration;

/**
 * Class m241101_171239_add_source_field_to_sign_table
 */
class m241101_171239_add_source_field_to_sign_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('ALTER TABLE `sign` ADD COLUMN `source` varchar(255) NULL;');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241101_171239_add_source_field_to_sign_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241101_171239_add_source_field_to_sign_table cannot be reverted.\n";

        return false;
    }
    */
}
