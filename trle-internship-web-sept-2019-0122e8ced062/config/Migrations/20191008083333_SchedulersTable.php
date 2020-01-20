<?php
use Migrations\AbstractMigration;

class SchedulersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $schedulers = $this->table('schedulers');

        $schedulers->addColumn('model_id', 'integer')
            ->addColumn('model', 'string', ['limit' => 20])
            ->addColumn('user_id', 'integer')
            ->addForeignKey('user_id', 'users')
            ->addColumn('start_on', 'datetime')
            ->addColumn('alert', 'string', ['limit' => 45] )
            ->addColumn('created_by','integer',  ['null' => true])
            ->addColumn('updated_by','integer',  ['null' => true])
            ->addColumn('modified','datetime', ['null' => true])
            ->addColumn('created','datetime', ['null' => true])
            ->create();
    }

    public function down()
    {
        $this->table('schedulers')->drop()->save();
    }
}
