<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UzemniRealizace Entity
 *
 * @property string $idUzemi
 * @property string $idDotace
 * @property bool $mezinarodniPusobnostIndikator
 * @property bool $iriRealizovanNaUzemiStatu
 * @property bool $uzemniRealizacePopis
 * @property bool $obvodPrahaPredavaciKod
 * @property bool $spravniObvodPrahaPredavaciKod
 * @property bool $stavebniObjektKod
 * @property bool $uliceKod
 * @property bool $iriCastObce
 * @property bool $iriKraj
 * @property bool $iriMestskyObvodMestskaCast
 * @property bool $iriObec
 * @property bool $iriOkres
 * @property bool $iriVusc
 * @property bool $adresniMistoKod
 * @property string $okresNutsKod
 * @property \Cake\I18n\Time $dtAktualizace
 * @property \Cake\I18n\Time $dPlatnost
 */
class UzemniRealizace extends Entity
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
        'idUzemi' => false
    ];
}
