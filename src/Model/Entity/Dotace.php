<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dotace Entity
 *
 * @property string $idDotace
 * @property string $idPrijemce
 * @property string $projektKod
 * @property \Cake\I18n\Time $podpisDatum
 * @property float $subjektRozliseniKod
 * @property \Cake\I18n\Time $ukonceniPlanovaneDatum
 * @property \Cake\I18n\Time $ukonceniSkutecneDatum
 * @property \Cake\I18n\Time $zahajeniPlanovaneDatum
 * @property \Cake\I18n\Time $zahajeniSkutecneDatum
 * @property bool $zmenaSmlouvyIndikator
 * @property string $projektIdnetifikator
 * @property string $projektNazev
 * @property string $iriOperacniProgram
 * @property string $iriPodprogram
 * @property string $iriPriorita
 * @property string $iriOpatreni
 * @property string $iriPodopatreni
 * @property string $iriGrantoveSchema
 * @property bool $iriProgramPodpora
 * @property bool $iriTypCinnosti
 * @property bool $iriProgram
 * @property \Cake\I18n\Time $dPlatnost
 * @property \Cake\I18n\Time $dtAktualizace
 */
class Dotace extends Entity
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
        'idDotace' => false
    ];
}
