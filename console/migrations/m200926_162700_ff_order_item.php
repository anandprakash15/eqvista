<?php

use yii\db\Migration;

/**
 * Class m200926_162700_ff_order_item
 */
class m200926_162700_ff_order_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            
            $this->createTable('{{%ff_order_item}}', [
            'id' => $this->primaryKey(),
            'item_name' => $this->string(50)->notNull()->unique(),
            'description' => $this->string(255)->Null(),
            'price'=>$this->decimal(10,5)->notNull(),    
            'status' => $this->smallInteger()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->Null(),
        ], $tableOptions);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200926_162700_ff_order_item cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200926_162700_ff_order_item cannot be reverted.\n";

        return false;
    }
    */
}
