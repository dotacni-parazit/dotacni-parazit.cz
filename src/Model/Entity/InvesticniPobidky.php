<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InvesticniPobidky Entity
 *
 * @property float $id
 * @property string $name
 * @property string $ico
 * @property string $vymazanoOR
 * @property string $poznamka
 * @property string $sektor
 * @property string $cz_nace
 * @property string $druhInvesticniAkce
 * @property string $zemePuvodu
 * @property float $investiceEUR
 * @property float $investiceUSD
 * @property float $investiceCZK
 * @property int $vytvorenaPracovniMista
 * @property string $pobidkaDane
 * @property string $pobidkaPracovniMista
 * @property string $pobidkaRekvalifikace
 * @property string $pobidkaPozemky
 * @property string $pobidkaKapitalovaPodpora
 * @property string $miraVerejnePodpory
 * @property string $stropVerejnePodpory
 * @property string $okres
 * @property string $kraj
 * @property string $nutsII
 * @property float $podaniZameruRok
 * @property float $rozhodnutiDen
 * @property string $rozhodnutiMesic
 * @property float $rozhodnutiRok
 * @property string $msp
 * @property string $zruseniRozhodnutiNeboOdstoupeni
 */
class InvesticniPobidky extends Entity
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
