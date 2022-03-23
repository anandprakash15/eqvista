<?php

use yii\db\Migration;

/**
 * Class m200926_151833_ff_orders
 */
class m200926_151833_ff_orders extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            
            $this->createTable('{{%ff_orders}}', [
            'id' => $this->primaryKey(),
            'user_identifier' => $this->string()->notNull(),
            'order_items' => $this->string(100)->notNull(),
            'subtotal_amount' => $this->decimal(10,5)->notNull(),
            'shipping_amount' => $this->decimal(10,5)->notNull(),
            'total_amount' => $this->decimal(10,5)->notNull(),
            'notes' => $this->string(255)->Null(),
            'delivery_date' => $this->date()->notNull(),
            'payment_method' => $this->smallInteger()->notNull(),
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
        echo "m200926_151833_ff_orders cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200926_151833_ff_orders cannot be reverted.\n";

        return false;
    }
    */
}
