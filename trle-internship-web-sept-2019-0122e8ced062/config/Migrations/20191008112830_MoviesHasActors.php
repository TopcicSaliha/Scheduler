<?php
use Migrations\AbstractMigration;

class MoviesHasActors extends AbstractMigration
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
        $movie_actors = $this->table('movie_actors');

        $movie_actors->addColumn('actors_id','integer')
            ->addForeignKey('actors_id', 'actors')
            ->addColumn('movies_id','integer')
            ->addForeignKey('movies_id', 'movies')
            ->addColumn('role','string', ['limit' => 20])
            ->addColumn('created_by','integer',  ['null' => true])
            ->addColumn('updated_by','integer',  ['null' => true])
            ->addColumn('modified','datetime', ['null' => true])
            ->addColumn('created','datetime', ['null' => true])
            ->create();
    }

    public function down()
    {
        $this->table('movie_actors')->drop()->save();
    }
}
