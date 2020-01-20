<?php
use Migrations\AbstractMigration;

class EpisodeRatingsTable extends AbstractMigration
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
        $episode_ratings = $this->table('episode_ratings');

        $episode_ratings->addColumn('users_id','integer')
            ->addForeignKey('users_id', 'users')
            ->addColumn('episodes_id','integer', ['null' =>true])
            ->addForeignKey('episodes_id', 'episodes')
            ->addColumn('action','string')
            ->addColumn('created_by','integer',  ['null' => true])
            ->addColumn('updated_by','integer',  ['null' => true])
            ->addColumn('modified','datetime', ['null' => true])
            ->addColumn('created','datetime', ['null' => true])
            ->create();
    }

    public function down()
    {
        $this->table('episode_ratings')->drop()->save();
    }
}
