<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EpisodeRating Entity
 *
 * @property int $id
 * @property int $users_id
 * @property int|null $episodes_id
 * @property string $action
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Episode $episode
 */
class EpisodeRating extends Entity
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
        'users_id' => true,
        'episodes_id' => true,
        'action' => true,
        'created_by' => true,
        'updated_by' => true,
        'modified' => true,
        'created' => true,
        'user' => true,
        'episode' => true
    ];
}
