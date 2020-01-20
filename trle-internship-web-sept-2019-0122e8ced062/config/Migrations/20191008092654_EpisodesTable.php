<?php
use Migrations\AbstractMigration;

class EpisodesTable extends AbstractMigration
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
        $episodes = $this->table('episodes');

        $episodes->addColumn('seasons_id','integer')
            ->addForeignKey('seasons_id', 'seasons')
            ->addColumn('title', 'string', ['limit' => 20])
            ->addColumn('description', 'text', ['null' => true])
            ->addColumn('duration', 'integer')
            ->addColumn('created_by','integer',  ['null' => true])
            ->addColumn('updated_by','integer',  ['null' => true])
            ->addColumn('modified','datetime', ['null' => true])
            ->addColumn('created','datetime', ['null' => true])
            ->create();
    }

    public function down()
    {
        $this->table('episodes')->drop()->save();
    }
}
