<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AresAngosPO Entity
 *
 * @property int $id
 * @property float $ico
 * @property \Cake\I18n\FrozenDate $dod
 * @property \Cake\I18n\FrozenDate $ddo
 * @property string $nazev_ang
 * @property float $kategorie_ang
 * @property string $funkce
 * @property \Cake\I18n\FrozenDate $clenstvi_zacatek
 * @property \Cake\I18n\FrozenDate $clenstvi_konec
 * @property \Cake\I18n\FrozenDate $funkce_zacatek
 * @property \Cake\I18n\FrozenDate $funkce_konec
 * @property float $ico_ang
 * @property string $izo_ang
 * @property string $nazev
 * @property string $pravni_forma
 * @property string $stat
 */
class AresAngosPO extends Entity
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
        'ico_ang' => true,
        'izo_ang' => true,
        'nazev' => true,
        'pravni_forma' => true,
        'stat' => true
    ];
}
