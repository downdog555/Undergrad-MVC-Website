<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $contactNumber
 * @property string $username
 * @property string $password
 * @property int $hoursRequiredWeekly
 * @property string $jobType
 * @property int $CurrentlyIn
 *
 * @property \App\Model\Entity\Card[] $cards
 */
class Employee extends Entity
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
        'address' => true,
        'contactNumber' => true,
        'username' => true,
        'password' => true,
        'hoursRequiredWeekly' => true,
        'jobType' => true,
        'CurrentlyIn' => true,
        'cards' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
