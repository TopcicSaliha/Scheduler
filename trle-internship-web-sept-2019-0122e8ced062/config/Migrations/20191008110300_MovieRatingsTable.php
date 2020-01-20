<?php
use Migrations\AbstractMigration;

class MovieRatingsTable extends AbstractMigration
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
        $movie_ratings = $this->table('movie_ratings');

        $movie_ratings->addColumn('users_id','integer')
            ->addForeignKey('users_id', 'users')
            ->addColumn('movies_id','integer')
            ->addForeignKey('movies_id', 'movies')
            ->addColumn('action','string')
            ->addColumn('created_by','integer',  ['null' => true])
            ->addColumn('updated_by','integer',  ['null' => true])
            ->addColumn('modified','datetime', ['null' => true])
            ->addColumn('created','datetime', ['null' => true])
            ->create();
    }

    public function down()
    {
        $this->table('movie_ratings')->drop()->save();
    }
}
