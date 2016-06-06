<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class Tag2targetMigration_100
 */
class Tag2targetMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('tag2target', array(
                'columns' => array(
                    new Column(
                        'tag_id',
                        array(
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 11,
                            'first' => true
                        )
                    ),
                    new Column(
                        'target_id',
                        array(
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull' => true,
                            'size' => 11,
                            'after' => 'tag_id'
                        )
                    )
                ),
                'indexes' => array(
                    new Index('PRIMARY', array('tag_id', 'target_id'), 'PRIMARY'),
                    new Index('FK_tag2target_target', array('target_id'), null)
                ),
                'references' => array(
                    new Reference(
                        'FK_tag2target_tag',
                        array(
                            'referencedSchema' => 'beridelay',
                            'referencedTable' => 'tag',
                            'columns' => array('tag_id'),
                            'referencedColumns' => array('id'),
                            'onUpdate' => 'RESTRICT',
                            'onDelete' => 'RESTRICT'
                        )
                    ),
                    new Reference(
                        'FK_tag2target_target',
                        array(
                            'referencedSchema' => 'beridelay',
                            'referencedTable' => 'target',
                            'columns' => array('target_id'),
                            'referencedColumns' => array('id'),
                            'onUpdate' => 'RESTRICT',
                            'onDelete' => 'RESTRICT'
                        )
                    )
                ),
                'options' => array(
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '',
                    'ENGINE' => 'InnoDB',
                    'TABLE_COLLATION' => 'utf8_general_ci'
                ),
            )
        );
    }

    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {

    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {

    }

}