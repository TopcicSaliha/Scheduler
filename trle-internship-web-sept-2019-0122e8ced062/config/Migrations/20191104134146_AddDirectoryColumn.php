<?php
use Migrations\AbstractMigration;

class AddDirectoryColumn extends AbstractMigration
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
        $users = $this->table('users');
        $users ->addColumn('image_dir', 'string')
            ->update();
    }
    public function down()
    {
        $this->table('users')->removeColumn('image_dir')->save();
    }
}
