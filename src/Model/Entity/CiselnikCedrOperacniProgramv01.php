<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CiselnikCedrOperacniProgramv01 Entity
 *
 * @property string $idOperacniProgram
 * @property string $operacaniProgramKod
 * @property string $operacaniProgramNazev
 * @property float $operacaniProgramCislo
 * @property \Cake\I18n\Time $zaznamPlatnostOdDatum
 * @property \Cake\I18n\Time $zaznamPlatnostDoDatum
 */
class CiselnikCedrOperacniProgramv01 extends Entity
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
        'idOperacniProgram' => false
    ];
}
