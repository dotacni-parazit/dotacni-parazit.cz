<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RozpoctoveObdobi Entity
 *
 * @property int $id
 * @property float $castkaCerpana
 * @property float $castkaSpotrebovana
 * @property float $castkaUvolnena
 * @property string $dotaceTitul
 * @property string $refRozpoctoveObdobi
 * @property int $rozpocetObdobi
 * @property string $ucelZnak
 * @property \Cake\I18n\Time $zaznamAktualizaceDatumCas
 * @property string $zaznamIdentifikator
 * @property \Cake\I18n\Time $zaznamPlatnostDatum
 * @property string $menaKod
 * @property string $title
 * @property float $castkaVracena
 * @property string $about
 * @property \Cake\I18n\Time $modified
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
        'id' => false
    ];
}
