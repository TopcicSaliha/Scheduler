<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Scheduler Entity
 *
 * @property int $id
 * @property int $model_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $start_on
 * @property string $alert
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\User $user
 */
class Scheduler extends Entity
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
        'model_id' => true,
        'model' => true,
        'user_id' => true,
        'start_on' => true,
        'alert' => true,
        'created_by' => true,
        'updated_by' => true,
        'modified' => true,
        'created' => true,
        'user' => true
    ];
}
