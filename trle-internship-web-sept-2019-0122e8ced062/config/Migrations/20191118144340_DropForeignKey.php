<?php
use Migrations\AbstractMigration;

class DropForeignKey extends AbstractMigration
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
        $tvShowsGenre = $this->table('tv_shows_genre');

        $tvShowsGenre->dropForeignKey('tv_shows_id')
            ->addForeignKey('tv_shows_id', 'tv_shows')
            ->update();

    }

    public function down()
    {
        $tvShowsGenre = $this->table('tv_shows_genre');

        $tvShowsGenre->dropForeignKey('tv_shows_id')
            ->addForeignKey('tv_shows_id', 'movies')
            ->update();
    }
}
