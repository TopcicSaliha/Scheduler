<?php
use Migrations\AbstractMigration;

class CommentTable extends AbstractMigration
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
        $comments = $this->table('comments');
        $comments ->addColumn('user_id', 'integer')
             ->addForeignKey('user_id', 'users')
             ->addColumn('movie_id', 'integer')
             ->addForeignKey('movie_id', 'movies')
             ->addColumn('created', 'date')
            ->create();
    }
    public function down()
    {
        $this->table('comments')->drop()->save();
    }
}
