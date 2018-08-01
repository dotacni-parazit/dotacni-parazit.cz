<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GrantyPrahaZadatel Entity
 *
 * @property int $id
 * @property string $nazev
 * @property float $ic
 * @property string $pravni_forma
 * @property string $ulice
 * @property float $cislo_popisne
 * @property string $cislo_orientacni
 * @property string $mestska_cast
 * @property string $psc
 * @property string $obec
 * @property string $id_projekt
 * @property string $id_zadatel
 * @property GrantyPrahaProjekty $Projekt
 */
class GrantyPrahaZadatel extends Entity
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
        'nazev' => true,
        'ic' => true,
        'pravni_forma' => true,
        'ulice' => true,
        'cislo_popisne' => true,
        'cislo_orientacni' => true,
        'mestska_cast' => true,
        'psc' => true,
        'obec' => true,
        'id_projekt' => true,
        'id_zadatel' => true
    ];
}
