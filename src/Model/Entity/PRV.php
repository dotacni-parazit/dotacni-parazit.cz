<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PRV Entity
 *
 * @property int $id
 * @property string $ico
 * @property string $jmeno
 * @property string $obec
 * @property string $okres
 * @property string $zdroj
 * @property string $opatreni
 * @property float $czk_tuzemske
 * @property float $czk_evropske
 * @property float $czk_celkem
 */
class PRV extends Entity
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
        '*' => true,
        'id' => false
    ];
}
