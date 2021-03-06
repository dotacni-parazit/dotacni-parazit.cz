<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CiselnikCedrPrioritav01 Entity
 *
 * @property string $idPriorita
 * @property string $idOperacniProgram
 * @property bool $idPodprogram
 * @property string $prioritaKod
 * @property string $prioritaNazev
 * @property float $prioritaCislo
 * @property \Cake\I18n\Time $zaznamPlatnostOdDatum
 * @property \Cake\I18n\Time $zaznamPlatnostDoDatum
 */
class CiselnikCedrPrioritav01 extends Entity
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
        'idPriorita' => false
    ];
}
