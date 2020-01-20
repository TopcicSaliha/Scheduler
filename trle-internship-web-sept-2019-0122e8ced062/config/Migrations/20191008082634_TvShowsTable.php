<?php
use Migrations\AbstractMigration;

class TvShowsTable extends AbstractMigration
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
        $tv_shows = $this->table('tv_shows');

        $tv_shows->addColumn('title', 'string', ['limit' => 20])
            ->addColumn('description', 'text')
            ->addColumn('year', 'integer')
            ->addColumn('duration', 'integer')
            ->addColumn('cover', 'string')
            ->addColumn('created_by','integer',  ['null' => true])
            ->addColumn('updated_by','integer',  ['null' => true])
            ->addColumn('modified','datetime', ['null' => true])
            ->addColumn('created','datetime', ['null' => true])
            ->create();
    }

    public function down()
    {
        $this->table('tv_shows')->drop()->save();
    }
}
