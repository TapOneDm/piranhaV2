<?php

use yii\db\Migration;

/**
 * Class m230910_132633_add_team_table
 */
class m230910_132633_add_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE team (
                id int NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (id),
                image_file_id int NOT NULL,
                name varchar(255) NOT NULL,
                description text NOT NULL,
                sort_order int NULL
            );
        ');

        $this->execute('CREATE INDEX team_file_id ON team (image_file_id);');
        $this->execute('ALTER TABLE team ADD FOREIGN KEY (image_file_id) REFERENCES file (id)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230910_132633_add_team_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230910_132633_add_team_table cannot be reverted.\n";

        return false;
    }
    */
}
