<?php

use yii\db\Migration;

class m190618_042004_bluda_table extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m190618_042004_bluda_table cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('bluda', [
            'id' => $this->primaryKey(11),
            'name' => $this->string(250)->notNull(),
            'datecreate' => $this->smallInteger(11),
            'lastupdate' => $this->smallInteger(11),
            'status' => $this->smallInteger(4),
        ]);

        $this->alterColumn('ingredient', 'id', $this->smallInteger(8).' NOT NULL AUTO_INCREMENT');
    }

    public function down()
    {
        echo "m190618_042004_bluda_table cannot be reverted.\n";

        return false;
    }

}
