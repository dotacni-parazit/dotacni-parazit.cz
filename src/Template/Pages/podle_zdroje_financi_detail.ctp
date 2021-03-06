<?php
/**
 * @var AppView $this
 */

use App\View\AppView;
use App\View\DPUTILS;
use Cake\I18n\Number;

$this->set('title', $zdroj->financniZdrojNazev);

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#years">Historie v letech</a></li>
        <li><a href="#rozhodnuti">1000 Nejvyšších Rozhodnutí</a></li>
    </ul>
    <div id="years">

        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th class="nosearch">Rok</th>
                <th class="nosearch" data-type="currency">Součet Rozhodnutí</th>
                <th class="nosearch" data-type="currency">Součet Spotřebovaných</th>
                <th class="nosearch">Detail</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($year_to_sum as $key => $value) {
                ?>
                <tr>
                    <td><?= $key ?></td>
                    <td style="text-align: right"><?= Number::currency($value[0]) ?></td>
                    <td style="text-align: right"><?= Number::currency($value[1]) ?></td>
                    <td style="text-align: right"><?= $this->Html->link('Otevřít', '/podle-zdroje-financi/' . $zdroj->financniZdrojKod . '/rok/' . $key) ?></td>
                </tr>
                <?php
            }
            ?>

            <tr>
                <td><?= 'Součet' ?></td>
                <td style="text-align: right"><?= Number::currency($sum) ?></td>
                <td style="text-align: right"><?= Number::currency($sum_spotrebovano) ?></td>
                <td style="text-align: right"><?= $this->Html->link('Otevřít Kompletní Výpis', '/podle-zdroje-financi/' . $zdroj->financniZdrojKod . '/complete') ?></td>
            </tr>

            </tbody>
            <tfoot>
            <tr>
                <td>Rok</td>
                <td>Součet Rozhodnutí</td>
                <td>Součet Spotřebovaných</td>
                <td>Detail</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="rozhodnuti">

        <table id="datatable">
            <thead>
            <tr>
                <th data-type="html">Příjemce Pomoci</th>
                <th data-type="html">Dotace (kod nebo identifikator projektu)</th>
                <th data-type="currency">Částka Rozhodnutá</th>
                <th data-type="currency">Částka Spotřebovaná</th>
                <th data-type="year">Rok</th>
                <th data-type="string">Členění finančních prostředků</th>
                <th data-type="string">Finanční Zdroj</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($zdroj_biggest as $d) { ?>
                <tr>
                    <td><?= $this->Html->link($d->Dotace->PrijemcePomoci->obchodniJmeno, '/detail-prijemce-pomoci/' . $d->Dotace->PrijemcePomoci->idPrijemce) ?></td>
                    <td><?= $this->Html->link(DPUTILS::dotaceNazev($d->Dotace), '/detail-dotace/' . $d->Dotace->idDotace, ['escape' => false]) ?></td>
                    <td style="text-align: right"><?= Number::currency($d->castkaRozhodnuta) ?></td>
                    <td style="text-align: right"><?= !empty($d->RozpoctoveObdobi) ? Number::currency($d->RozpoctoveObdobi->castkaSpotrebovana) : 'N/A' ?></td>
                    <td><?= $d->rokRozhodnuti ?></td>
                    <td><?= $d->CleneniFinancnichProstredku->financniProstredekCleneniNazev ?></td>
                    <td><?= $d->FinancniZdroj->financniZdrojNazev ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Příjemce Pomoci</td>
                <td>Dotace (kod nebo identifikator projektu)</td>
                <td>Částka Rozhodnutá</td>
                <td>Částka Spotřebovaná</td>
                <td>Rok</td>
                <td>Členění finančních prostředků</td>
                <td>Finanční Zdroj</td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#tabs").tabs({
            collapsible: false,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>