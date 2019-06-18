<?php

use yii\db\Migration;

class m190618_041933_ingredient_table extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m190618_041933_ingredient_table cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('ingredient', [
            'id' => $this->primaryKey(11),
            'ingredient' => $this->string(250)->notNull(),
            'datecreate' => $this->smallInteger(11),
            'lastupdate' => $this->smallInteger(11),
            'status' => $this->smallInteger(4),
        ]);
        $this->alterColumn('ingredient', 'id', $this->smallInteger(8).' NOT NULL AUTO_INCREMENT');


    }

    public function down()
    {
        $this->dropTable('news');
    }
}
