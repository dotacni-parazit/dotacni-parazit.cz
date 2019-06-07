<?php
/**
 * @var AppView $this
 * @var Osoba $osoba
 */

use App\Model\Entity\Osoba;
use App\View\AppView;
use Cake\Cache\Cache;
use Cake\I18n\Number;

$this->set('title', 'Detail FO: ' . $osoba->jmeno . ' ' . $osoba->prijmeni)
?>

<h2>Společnosti, ve kterých se <?= $osoba->jmeno . ' ' . $osoba->prijmeni ?> angažoval nebo angažuje</h2>

<ui>
    <?php foreach ($osoba->ares_f_oto_i_c_o as $ic) { ?>
        <li><?= $ic->nazev[0]->nazev ?> (jako <?= join($icos[$ic->ico], ", ") ?>)
            <?php
            $cache_tag_ico_sum_rozhodnuti = 'sum_rozhodnuti_ico_' . sha1($ic->ico) . '_all_years';
            $cache_tag_ico_sum_spotrebovano = 'sum_spotrebovano_ico_' . sha1($ic->ico) . '_all_years';
            echo "<ul>";
            echo "<li>Součet Rozhodnutí: " . Number::currency(Cache::read($cache_tag_ico_sum_rozhodnuti, 'long_term')) . '</li>';
            echo "<li>Součet Spotřebováno: " . Number::currency(Cache::read($cache_tag_ico_sum_spotrebovano, 'long_term')) . '</li>';
            echo "</ul>"
            ?>
        </li>
    <?php } ?>
</ui>