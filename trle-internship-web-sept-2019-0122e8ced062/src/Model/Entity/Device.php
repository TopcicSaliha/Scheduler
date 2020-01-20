<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Device Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $device_number
 * @property string $token
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Device[] $devices
 */
class Device extends Entity
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
        'user_id' => true,
        'device_number' => true,
        'token' => true,
        'user' => true,
        'devices' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'token'
    ];
}
