<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PrijemcePomoci Entity
 *
 * @property string $idPrijemce
 * @property float $ico
 * @property string $obchodniJmeno
 * @property string $jmeno
 * @property string $prijmeni
 * @property string $iriPravniForma
 * @property float $rokNarozeni
 * @property string $iriStat
 * @property string $iriOsoba
 * @property string $iriEkonomikaSubjekt
 * @property \Cake\I18n\Time $dPlatnost
 * @property \Cake\I18n\Time $dtAktualizace
 */
class PrijemcePomoci extends Entity
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
        'idPrijemce' => false
    ];
}
