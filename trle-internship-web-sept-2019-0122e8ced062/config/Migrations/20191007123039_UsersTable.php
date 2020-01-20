<?php
use Migrations\AbstractMigration;

class UsersTable extends AbstractMigration
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

        $users->addColumn('first_name','string', ['limit' => 20])
            ->addColumn('last_name','string', ['limit' => 20] )
            ->addColumn('date_of_birth','date', ['null' => true])
            ->addColumn('gender','string', ['limit' => 10], ['null' => true])
            ->addColumn('email','string', ['limit' => 45])
            ->addColumn('password','string', ['limit' => 90], ['unique' => true])
            ->addColumn('image','string', ['null' => true])
            ->addColumn('is_active', 'boolean', ['null' => true] )
            ->addColumn('created_by','integer',  ['null' => true])
            ->addColumn('updated_by','integer',  ['null' => true])
            ->addColumn('modified','datetime', ['null' => true])
            ->addColumn('created','datetime', ['null' => true])
            ->create();
    }
    public function down()
    {
        $this->table('users')->drop()->save();
    }
}
