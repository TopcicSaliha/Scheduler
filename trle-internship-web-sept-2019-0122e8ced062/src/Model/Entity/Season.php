<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\Locator\TableLocator;

/**
 * Season Entity
 *
 * @property int $id
 * @property int $tv_shows_id
 * @property string $title
 * @property int $year
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\TvShow $tv_show
 */
class Season extends Entity
{
    protected $_virtual = ['episodesNumber'];
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
        'tv_shows_id' => true,
        'title' => true,
        'year' => true,
        'created_by' => true,
        'updated_by' => true,
        'modified' => true,
        'created' => true,
        'tv_show' => true
    ];

    protected function _getEpisodesNumber()
    {
        return (new TableLocator)->get('Episodes')->find()->where(['seasons_id' => $this->id])->count();
    }
}
