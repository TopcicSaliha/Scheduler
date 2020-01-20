<?php
use Migrations\AbstractMigration;

class SeasonsTable extends AbstractMigration
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
        $seasons = $this->table('seasons');

        $seasons->addColumn('tv_shows_id','integer')
            ->addForeignKey('tv_shows_id', 'tv_shows')
            ->addColumn('title', 'string', ['limit' => 20])
            ->addColumn('created_by','integer',  ['null' => true])
            ->addColumn('updated_by','integer',  ['null' => true])
            ->addColumn('modified','datetime', ['null' => true])
            ->addColumn('created','datetime', ['null' => true])
            ->create();
    }

    public function down()
    {
        $this->table('seasons')->drop()->save();
    }
}
