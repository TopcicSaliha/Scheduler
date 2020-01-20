<?php
use Migrations\AbstractMigration;

class SeasonReleaseYear extends AbstractMigration
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
        $seasons ->addColumn('year', 'integer', ['after' => 'title'])
            ->update();
    }
    public function down()
    {
        $this->table('seasons')->removeColumn('year')->save();
    }
}
