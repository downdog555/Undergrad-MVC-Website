<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Station Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $accessLevelRequired
 * @property string $stationKey
 *
 * @property \App\Model\Entity\Accesslog[] $accesslogs
 */
class Station extends Entity
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
        'name' => true,
        'description' => true,
        'accessLevelRequired' => true,
        'stationKey' => true,
        'accesslogs' => true
    ];
}
