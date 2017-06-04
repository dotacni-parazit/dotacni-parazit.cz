<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dotace Entity
 *
 * @property int $id
 * @property string $about
 * @property string $byloRozhodnuto
 * @property \Cake\I18n\Time $podaniDatum
 * @property string $projektKod
 * @property \Cake\I18n\Time $smlouvaPodpisDatum
 * @property \Cake\I18n\Time $zaznamAktualizaceDatumCas
 * @property string $zaznamIdentifikator
 * @property \Cake\I18n\Time $zaznamPlatnostDatum
 * @property string $zmenaSmlouvaIdikator
 * @property string $projektIdentifikator
 * @property string $title
 * @property string $podprogram
 * @property string $operacniProgramCEDR
 * @property int $subjektRozliseniKod
 * @property string $operacniProgramMMR
 * @property string $prioritaMMR
 * @property string $opatreniMMR
 * @property string $podOpatreni
 * @property string $grantoveSchemaMMR
 * @property \Cake\I18n\Time $ukonceniSkutecneDatum
 * @property \Cake\I18n\Time $zahajeniSkutecneDatum
 * @property \Cake\I18n\Time $ukonceniPlanovaneDatum
 * @property string $clenenNaEtapu
 * @property string $realizovanNaUzemi
 * @property string $prioritaCEDR
 * @property string $projektNadrizenyIdentifikator
 * @property string $podOpatreniCEDR
 * @property string $opatreniCEDR
 * @property string $poznamkaCEDR
 * @property \Cake\I18n\Time $modified
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
        'id' => false
    ];
}
