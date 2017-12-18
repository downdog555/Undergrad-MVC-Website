<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Card Entity
 *
 * @property int $id
 * @property string $manufacturedata
 * @property string $assigneddata
 * @property int $access_level
 * @property int $employee_id
 *
 * @property \App\Model\Entity\Employee $employee
 */
class Card extends Entity
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
        'manufacturedata' => true,
        'assigneddata' => true,
        'access_level' => true,
        'employee_id' => true,
        'employee' => true
    ];
}
