<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RozpoctoveObdobi Entity
 *
 * @property string $idObdobi
 * @property string $idRozhodnuti
 * @property float $castkaCerpana
 * @property float $castkaUvolnena
 * @property float $castkaVracena
 * @property float $castkaSpotrebovana
 * @property float $rozpoctoveObdobi
 * @property bool $vyporadaniKod
 * @property string $iriDotacniTitul
 * @property string $iriUcelovyZnak
 * @property \Cake\I18n\Time $dPlatnost
 * @property \Cake\I18n\Time $dtAktualizace
 */
class RozpoctoveObdobi extends Entity
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
        'idObdobi' => false
    ];
}
