<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dotinfo Entity
 *
 * @property int $id
 * @property string $idDotace
 * @property string $projektIdentifikator
 * @property string $dotaceNazev
 * @property string $ucastnikObchodniJmeno
 * @property int $ucastnikIco
 * @property string $ucelDotace
 * @property string $poskytovatelNazev
 * @property int $poskytovatelIco
 * @property int $castkaPozadovana
 * @property int $castkaSchvalena
 * @property string $datumPoskytnuti
 * @property string $dotinfoId
 */
class Dotinfo extends Entity
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
