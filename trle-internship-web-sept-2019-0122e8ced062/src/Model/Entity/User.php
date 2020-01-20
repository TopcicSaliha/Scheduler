<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\Utility\Security;
/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property \Cake\I18n\FrozenDate|null $date_of_birth
 * @property string $gender
 * @property string $email
 * @property string $password
 * @property string|null $image
 * @property bool|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Scheduler[] $schedulers
 */
class User extends Entity
{
    const ACTIVE = 1;
    const INACTIVE = 0;
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
        'first_name' => true,
        'last_name' => true,
        'date_of_birth' => true,
        'gender' => true,
        'email' => true,
        'password' => true,
        'image' => true,
        'is_active' => true,
        'created_by' => true,
        'updated_by' => true,
        'modified' => true,
        'created' => true,
        'schedulers' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
