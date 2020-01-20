<?php
use Migrations\AbstractMigration;

class DevicesTable extends AbstractMigration
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
        $devices = $this->table('devices');

        $devices->addColumn('user_id', 'integer')
            ->addForeignKey('user_id', 'users')
            ->addColumn('device_id', 'string')
            ->addColumn('token', 'string')
            ->create();
    }

    public function down()
    {
        $this->table('devices')->drop()->save();
    }
}
