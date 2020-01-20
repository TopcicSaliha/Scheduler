<?php
use Migrations\AbstractMigration;

class TvShowsHasGenresTable extends AbstractMigration
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
        $tv_shows_genre = $this->table('tv_shows_genre');

        $tv_shows_genre->addColumn('genres_id','integer')
            ->addForeignKey('genres_id', 'genres')
            ->addColumn('tv_shows_id','integer')
            ->addForeignKey('tv_shows_id', 'movies')
            ->addColumn('created_by','integer',  ['null' => true])
            ->addColumn('updated_by','integer',  ['null' => true])
            ->addColumn('modified','datetime', ['null' => true])
            ->addColumn('created','datetime', ['null' => true])
            ->create();
    }

    public function down()
    {
        $this->table('tv_shows_genre')->drop()->save();
    }
}
