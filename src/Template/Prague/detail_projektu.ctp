<?php
/**
 * @var AppView $this
 */

use App\Model\Entity\GrantyPrahaProjekty;
use App\View\AppView;
use Cake\I18n\Number;

/** @var GrantyPrahaProjekty $projekt */
$this->set('title', $projekt->nazev_projektu);

$prijemce = $projekt->Zadatel;

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>


<div id="tabs">
    <ul>
        <li><a href="#basics">Základní informace o Projektu</a></li>
        <li><a href="#prijemce">Informace o příjemci</a></li>
        <li><a href="#usneseni">Usnesení</a></li>
    </ul>

    <div id="basics">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Vlastnost</th>
                <th>Hodnota</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Název projektu</td>
                <td><?= $projekt->nazev_projektu ?></td>
            </tr>

            <tr>
                <td>Popis projektu</td>
                <td><?= $projekt->popis ?></td>
            </tr>

            <tr>
                <td>Stav projektu</td>
                <td><?= $projekt->stav ?></td>
            </tr>

            <tr>
                <td>Název grantového programu</td>
                <td><?= $projekt->nazev_programu ?></td>
            </tr>

            <tr>
                <td>Grantová oblast</td>
                <td><?= $projekt->nazev_oblasti ?></td>
            </tr>

            <tr>
                <td>Účel dotace</td>
                <td><?= $projekt->ucel_dotace ?></td>
            </tr>

            <tr>
                <td>Rok Od</td>
                <td><?= $projekt->rok_od ?></td>
            </tr>

            <tr>
                <td>Rok Do</td>
                <td><?= $projekt->rok_do ?></td>
            </tr>

            <tr>
                <td>Náklady projektu</td>
                <td><?= Number::currency($projekt->castka_naklady) ?></td>
            </tr>

            <tr>
                <td>Požadovaná částka dotace</td>
                <td><?= Number::currency($projekt->castka_pozadovana) ?></td>
            </tr>

            <tr>
                <td>Přidělená částka dotace</td>
                <td><?= Number::currency($projekt->castka_pridelena) ?></td>
            </tr>

            <tr>
                <td>Vyčerpaná částka dotace</td>
                <td><?= Number::currency($projekt->castka_vycerpana) ?></td>
            </tr>

            </tbody>
        </table>
    </div>

    <div id="prijemce">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th class="nosearch">Vlastnost</th>
                <th class="nosearch">Hodnota</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Název</td>
                <td><?= $prijemce->nazev ?></td>
            </tr>
            <tr>
                <td>IČO</td>
                <td><?= $prijemce->ic ?></td>
            </tr>

            <tr>
                <td>Právní Forma</td>
                <td><?= $prijemce->pravni_forma ?></td>
            </tr>

            <tr>
                <td>Sídlo</td>
                <td><?= $prijemce->ulice . ' ' . $prijemce->cislo_popisne . '/' . $prijemce->cislo_orientacni . ', ' . $prijemce->mestska_cast . ', ' . $prijemce->obec . ', ' . $prijemce->psc ?></td>
            </tr>

            </tbody>
            <tfoot>
            <tr>
                <td>Vlastnost</td>
                <td>Hodnota</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="usneseni">
        <table class="datatable">
            <thead>
            <tr>
                <th>Číslo usnesení</th>
                <th>Schválil</th>
                <th>Datum usnesení</th>
                <th>Číslo smlouvy</th>
                <th>Částka přidělená</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($projekt->Usneseni as $u) { ?>
                <tr>
                    <td><?= $u->cislo_usneseni ?></td>
                    <td><?= $u->schvalil ?></td>
                    <td><?= $u->datum_schvaleni ?></td>
                    <td><?= $u->cislo_smlouvy ?></td>
                    <td><?= Number::currency($u->castka_pridelena) ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: false,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>
