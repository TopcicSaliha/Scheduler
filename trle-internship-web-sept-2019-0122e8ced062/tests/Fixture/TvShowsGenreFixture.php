<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TvShowsGenreFixture
 */
class TvShowsGenreFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tv_shows_genre';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'genres_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tv_shows_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created_by' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'updated_by' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'genres_id' => ['type' => 'index', 'columns' => ['genres_id'], 'length' => []],
            'tv_shows_id' => ['type' => 'index', 'columns' => ['tv_shows_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'tv_shows_genre_ibfk_1' => ['type' => 'foreign', 'columns' => ['genres_id'], 'references' => ['genres', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'tv_shows_genre_ibfk_2' => ['type' => 'foreign', 'columns' => ['tv_shows_id'], 'references' => ['movies', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'genres_id' => 1,
                'tv_shows_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'modified' => '2019-10-09 11:14:51',
                'created' => '2019-10-09 11:14:51'
            ],
        ];
        parent::init();
    }
}
