<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdresaSidlo Entity
 *
 * @property int $id
 * @property string $about
 * @property string $nachaziSeNaUzemiStatu
 * @property \Cake\I18n\Time $zaznamAktualizaceDatumCas
 * @property string $zaznamIdentifikator
 * @property \Cake\I18n\Time $zaznamPlatnostDatum
 * @property int $adresniMistoKod
 * @property int $castObceKod
 * @property int $obecKod
 * @property string $obecNazev
 * @property int $objektCisloDomovni
 * @property int $psc
 * @property int $uliceKod
 * @property string $uliceNazev
 * @property string $obec
 * @property string $title
 * @property string $adresaKvalifikatorKod
 * @property int $mestskyObvodMestskaCastKod
 * @property string $mestskyObvodMestskaCastNazev
 * @property string $objektCisloOrientacni
 * @property string $mestskyObvodMestskaCast
 * @property string $adresaText
 * @property \Cake\I18n\Time $modified
 */
class AdresaSidlo extends Entity
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
