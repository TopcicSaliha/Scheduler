<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Episode Entity
 *
 * @property int $id
 * @property int $seasons_id
 * @property string $title
 * @property string|null $description
 * @property int $duration
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Season $season
 */
class Episode extends Entity
{
    protected $_virtual = ['genre', 'durationString'];
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
        'seasons_id' => true,
        'title' => true,
        'description' => true,
        'duration' => true,
        'created_by' => true,
        'updated_by' => true,
        'modified' => true,
        'created' => true,
        'season' => true
    ];

    public function _getDurationString()
    {
        $duration = $this->duration;
        $hour = floor($duration / 60);
        $minutes = $duration % 60;

        return "{$hour}:{$minutes}";
    }
}
