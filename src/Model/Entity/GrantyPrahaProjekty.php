<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GrantyPrahaProjekty Entity
 *
 * @property int $id
 * @property string $cislo_projektu
 * @property string $nazev_projektu
 * @property string $popis
 * @property string $stav
 * @property string $nazev_programu
 * @property string $nazev_oblasti
 * @property string $ucel_dotace
 * @property string $rok_od
 * @property string $rok_do
 * @property float $castka_naklady
 * @property float $castka_pozadovana
 * @property float $castka_pridelena
 * @property float $castka_vycerpana
 * @property string $id_projekt
 * @property string $id_zadatel
 * @property GrantyPrahaZadatel $Zadatel
 * @property GrantyPrahaUsneseni[] $Usneseni
 */
class GrantyPrahaProjekty extends Entity
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
        'cislo_projektu' => true,
        'nazev_projektu' => true,
        'popis' => true,
        'stav' => true,
        'nazev_programu' => true,
        'nazev_oblasti' => true,
        'ucel_dotace' => true,
        'rok_od' => true,
        'rok_do' => true,
        'castka_naklady' => true,
        'castka_pozadovana' => true,
        'castka_pridelena' => true,
        'castka_vycerpana' => true,
        'id_projekt' => true,
        'id_zadatel' => true
    ];
}
