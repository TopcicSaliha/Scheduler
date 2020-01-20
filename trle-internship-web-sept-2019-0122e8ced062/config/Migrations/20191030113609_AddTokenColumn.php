<?php
use Migrations\AbstractMigration;

class AddTokenColumn extends AbstractMigration
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
        $users ->addColumn('reset_password_token', 'string', ['limit' => 90])
            ->update();
    }
    public function down()
    {
        $this->table('users')->removeColumn('reset_password_token')->save();
    }
}
