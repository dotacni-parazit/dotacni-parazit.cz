<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PrijemcePomoci Entity
 *
 * @property int $id
 * @property string $about
 * @property string $jePrislusnikStatu
 * @property string $jeRegistrovanSPravniFormou
 * @property string $obdrzelDotaci
 * @property string $sidliNaAdrese
 * @property \Cake\I18n\Time $zaznamAktualizaceDatumCas
 * @property string $zaznamIdentifikator
 * @property \Cake\I18n\Time $zaznamPlatnostDatum
 * @property int $ico
 * @property string $obchodniJmeno
 * @property string $legalName
 * @property string $maTrvaleBydlisteNaAdrese
 * @property string $jmeno
 * @property string $prijmeni
 * @property int $narozeniRok
 * @property string $firstName
 * @property string $lastName
 * @property string $dic
 * @property \Cake\I18n\Time $modified
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
        'id' => false
    ];
}
