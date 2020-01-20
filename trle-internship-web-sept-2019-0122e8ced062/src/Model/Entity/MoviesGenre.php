<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MoviesGenre Entity
 *
 * @property int $id
 * @property int $genres_id
 * @property int $movies_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Genre $genre
 * @property \App\Model\Entity\Movie $movie
 */
class MoviesGenre extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'genres_id' => true,
        'movies_id' => true,
        'created_by' => true,
        'updated_by' => true,
        'modified' => true,
        'created' => true,
        'genre' => true,
        'movie' => true
    ];
}
