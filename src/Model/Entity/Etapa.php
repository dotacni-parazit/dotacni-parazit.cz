<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Etapa Entity
 *
 * @property int $id
 * @property string $about
 * @property string $etapaIdentifikator
 * @property string $etapaNazev
 * @property string $poznamka
 * @property \Cake\I18n\Time $ukonceniPlanovaneDatum
 * @property \Cake\I18n\Time $ukonceniSkutecneDatum
 * @property \Cake\I18n\Time $zahajeniPlanovaneDatum
 * @property \Cake\I18n\Time $zahajeniSkutecneDatum
 * @property \Cake\I18n\Time $zaznamAktualizaceDatumCas
 * @property string $zaznamIdentifikator
 * @property string $title
 * @property \Cake\I18n\Time $modified
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
        'id' => false
    ];
}
