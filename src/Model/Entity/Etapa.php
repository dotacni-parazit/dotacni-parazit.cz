<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Etapa Entity
 *
 * @property string $idEtapa
 * @property string $idDotace
 * @property float $etapaCislo
 * @property string $etapaNazev
 * @property \Cake\I18n\Time $ukonceniPlanovaneDatum
 * @property \Cake\I18n\Time $ukonceniSkutecneDatum
 * @property \Cake\I18n\Time $zahajeniPlanovaneDatum
 * @property \Cake\I18n\Time $zahajeniSkutecneDatum
 * @property string $poznamka
 * @property \Cake\I18n\Time $dtAktualizace
 */
class Etapa extends Entity
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
        'idEtapa' => false
    ];
}
