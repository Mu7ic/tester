<?php

use yii\db\Migration;

class m190618_041955_table_bluda_table extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m190618_041955_table_bluda_table cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('table_blud', [
            'id' => $this->primaryKey(11),
            'id_bluda' => $this->smallInteger(11),
            'id_ingredient' => $this->smallInteger(11),
            'datecreate' => $this->smallInteger(11),
            'lastupdate' => $this->smallInteger(11),
            'status' => $this->smallInteger(4),
        ]);
        $this->alterColumn('ingredient', 'id', $this->smallInteger(8).' NOT NULL AUTO_INCREMENT');

        $this->addForeignKey(
            'FK_table_blud',
            'table_blud',
            'id_bluda',
            'bluda',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'FK_table_blud2',
            'table_blud',
            'id_ingredient',
            'ingredient',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m190618_041955_table_bluda_table cannot be reverted.\n";

        return false;
    }

}
