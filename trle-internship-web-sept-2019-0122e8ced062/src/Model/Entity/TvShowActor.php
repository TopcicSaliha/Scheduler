<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TvShowActor Entity
 *
 * @property int $id
 * @property int $actors_id
 * @property int $tv_shows_id
 * @property string $role
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Actor $actor
 * @property \App\Model\Entity\TvShow $tv_show
 */
class TvShowActor extends Entity
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
        'actors_id' => true,
        'tv_shows_id' => true,
        'role' => true,
        'created_by' => true,
        'updated_by' => true,
        'modified' => true,
        'created' => true,
        'actor' => true,
        'tv_show' => true
    ];
}
