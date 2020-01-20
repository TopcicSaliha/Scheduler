<?php
use Migrations\AbstractMigration;

class MovieHasGenresTable extends AbstractMigration
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
        $movies_genre = $this->table('movies_genre');

        $movies_genre->addColumn('genres_id','integer')
            ->addForeignKey('genres_id', 'genres')
            ->addColumn('movies_id','integer')
            ->addForeignKey('movies_id', 'movies')
            ->addColumn('created_by','integer',  ['null' => true])
            ->addColumn('updated_by','integer',  ['null' => true])
            ->addColumn('modified','datetime', ['null' => true])
            ->addColumn('created','datetime', ['null' => true])
            ->create();
    }

    public function down()
    {
        $this->table('movies_genre')->drop()->save();
    }
}
