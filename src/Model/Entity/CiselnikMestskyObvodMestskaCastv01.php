<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CiselnikMestskyObvodMestskaCastv01 Entity
 *
 * @property string $id
 * @property float $mestskyObvodMestskaCastKod
 * @property string $mestskyObvodMestskaCastNazev
 * @property string $obecNad
 * @property string $pad2
 * @property string $pad3
 * @property string $pad4
 * @property bool $pad5
 * @property string $pad6
 * @property string $pad7
 * @property float $globalniNavrhZmenaIdentifikator
 * @property bool $nespravnostIndikator
 * @property float $transakceIdentifikator
 * @property \Cake\I18n\Time $zaznamPlatnostOdDatum
 * @property \Cake\I18n\Time $zaznamPlatnostDoDatum
 */
class CiselnikMestskyObvodMestskaCastv01 extends Entity
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
