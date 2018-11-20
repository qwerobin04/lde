<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Registration Entity
 *
 * @property int $id
 * @property string $BusinessName
 * @property string $NatureofBusiness
 * @property string $BusinessAddress
 * @property int $ContactNumber
 * @property string $EmailAddress
 * @property string $Website
 * @property string $FacebookPage
 * @property string $BusinessOwnersName
 * @property string $FullName
 */
class Registration extends Entity
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
        'id' => true,
        'BusinessName' => true,
        'NatureofBusiness' => true,
        'BusinessAddress' => true,
        'ContactNumber' => true,
        'EmailAddress' => true,
        'Website' => true,
        'FacebookPage' => true,
        'BusinessOwnersName' => true,
        'FullName' => true
    ];
}
