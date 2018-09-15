<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AresAngosFO Entity
 *
 * @property int $id
 * @property float $ico
 * @property \Cake\I18n\FrozenDate $dod
 * @property \Cake\I18n\FrozenDate $ddo
 * @property string $nazev_ang
 * @property float $kategorie_ang
 * @property string $funkce
 * @property string $clenstvi_zacatek
 * @property string $clenstvi_konec
 * @property \Cake\I18n\FrozenDate $funkce_zacatek
 * @property string $funkce_konec
 * @property string $titul_pred
 * @property string $titul_za
 * @property string $jmeno
 * @property string $prijmeni
 * @property \Cake\I18n\FrozenDate $datum_narozeni
 */
class AresAngosFO extends Entity
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
        'ico' => true,
        'dod' => true,
        'ddo' => true,
        'nazev_ang' => true,
        'kategorie_ang' => true,
        'funkce' => true,
        'clenstvi_zacatek' => true,
        'clenstvi_konec' => true,
        'funkce_zacatek' => true,
        'funkce_konec' => true,
        'titul_pred' => true,
        'titul_za' => true,
        'jmeno' => true,
        'prijmeni' => true,
        'datum_narozeni' => true
    ];
}
