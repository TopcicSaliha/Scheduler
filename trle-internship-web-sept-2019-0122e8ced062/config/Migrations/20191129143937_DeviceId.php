<?php
use Migrations\AbstractMigration;

class DeviceId extends AbstractMigration
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
        $device = $this->table('devices');
        $device ->removeColumn('device_id')
            ->addColumn('device_number', 'string')
            ->update();
    }
    public function down()
    {
        $device = $this->table('devices');
        $device ->removeColumn('device_id')
            ->addColumn('device_number', 'string')
            ->update();
    }
}
