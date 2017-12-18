<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Accesslog Entity
 *
 * @property int $id
 * @property int $card_id
 * @property int $station_id
 * @property \Cake\I18n\FrozenTime $time_accessed
 *
 * @property \App\Model\Entity\Card $card
 * @property \App\Model\Entity\Station $station
 */
class Accesslog extends Entity
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
        'card_id' => true,
        'station_id' => true,
        'time_accessed' => true,
        'card' => true,
        'station' => true
    ];
}
