<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CiselnikDotaceTitulv01 Entity
 *
 * @property string $idDotaceTitul
 * @property float $dotaceTitulKod
 * @property string $dotaceTitulVlastniKod
 * @property float $statniRozpocetKapitolaKod
 * @property string $dotaceTitulNazev
 * @property string $dotaceTitulNazevZkraceny
 * @property \Cake\I18n\Time $zaznamPlatnostOdDatum
 * @property \Cake\I18n\Time $zaznamPlatnostDoDatum
 */
class CiselnikDotaceTitulv01 extends Entity
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
        'idDotaceTitul' => false
    ];
}
