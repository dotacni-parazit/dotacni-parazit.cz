<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GrantyPrahaUsneseni Entity
 *
 * @property int $id
 * @property string $cislo_usneseni
 * @property string $datum_schvaleni
 * @property string $schvalil
 * @property string $cislo_smlouvy
 * @property string $castka_pridelena
 * @property string $id_projekt
 * @property string $id_zadatel
 */
class GrantyPrahaUsneseni extends Entity
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
        'cislo_usneseni' => true,
        'datum_schvaleni' => true,
        'schvalil' => true,
        'cislo_smlouvy' => true,
        'castka_pridelena' => true,
        'id_projekt' => true,
        'id_zadatel' => true
    ];
}
