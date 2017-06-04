<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CiselnikDotaceTitulV01 Entity
 *
 * @property int $id
 * @property string $about
 * @property string $dotaceTitulCiselnikAxisDotaceTitulKod
 * @property string $dotaceTitulNazevZkraceny
 * @property string $statniRozpocetKapitolaCiselnikAxisKapitolaKod
 * @property \Cake\I18n\Time $zaznamPlatnostDoDatum
 * @property \Cake\I18n\Time $zaznamPlatnostOdDatum
 * @property string $dotaceTitulKod
 * @property string $dotaceTitulNazev
 * @property string $dotaceTitulVlastniKod
 * @property int $statniRozpocetKapitolaKod
 * @property string $title
 * @property string $prefLabel
 * @property \Cake\I18n\Time $modified
 */
class CiselnikDotaceTitulV01 extends Entity
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
