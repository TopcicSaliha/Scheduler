<?php
use Migrations\AbstractMigration;

class SchedulerStatus extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $schedulers = $this->table('schedulers');
        $schedulers ->addColumn('is_send', 'boolean', ['after' => 'alert'])
            ->update();
    }
    public function down()
    {
        $this->table('schedulers')->removeColumn('is_send')->save();
    }
}
