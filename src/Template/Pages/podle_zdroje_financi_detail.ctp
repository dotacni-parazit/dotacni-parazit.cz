<?php
use Cake\I18n\Number;

$this->set('title', $zdroj->financniZdrojNazev . ' - Zdroj Financí');
?>
<table>
    <thead>
    <tr>
        <th><a href="?sort=year">Rok</a></th>
        <th><a href="?sort=sum">Součet Rozhodnutí</a></th>
        <th><a href="?sort=sum">Součet Spotřebovaných</a></th>
        <th>Detail</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($year_to_sum as $key => $value) {
        ?>
        <tr>
            <td><?= $this->Html->link($key, '/podle-zdroje-financi/' . $zdroj->financniZdrojKod . '/rok/' . $key) ?></td>
            <td style="text-align: right"><?= $this->Html->link(Number::currency($value[0], 'CZK', ['zero' => '0,00 Kč']), '/podle-zdroje-financi/' . $zdroj->financniZdrojKod . '/rok/' . $key) ?></td>
            <td style="text-align: right"><?= $this->Html->link(Number::currency($value[1], 'CZK', ['zero' => '0,00 Kč']), '/podle-zdroje-financi/' . $zdroj->financniZdrojKod . '/rok/' . $key) ?></td>
            <td><?= $this->Html->link('Otevřít', '/podle-zdroje-financi/' . $zdroj->financniZdrojKod . '/rok/' . $key) ?></td>
        </tr>
        <?php
    }
    ?>

    <tr>
        <td><?= $this->Html->link('Součet', '/podle-zdroje-financi/' . $zdroj->financniZdrojKod . '/rok') ?></td>
        <td style="text-align: right"><?= $this->Html->link(Number::currency($sum, 'CZK', ['zero' => '0,00 Kč']), '/podle-zdroje-financi/' . $zdroj->financniZdrojKod . '/complete') ?></td>
        <td style="text-align: right"><?= $this->Html->link(Number::currency($sum_spotrebovano, 'CZK', ['zero' => '0,00 Kč']), '/podle-zdroje-financi/' . $zdroj->financniZdrojKod . '/complete') ?></td>
        <td><?= $this->Html->link('Otevřít Kompletní Výpis', '/podle-zdroje-financi/' . $zdroj->financniZdrojKod . '/complete') ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <th><a href="?sort=year">Rok</a></th>
        <th><a href="?sort=sum">Součet Rozhodnutí</a></th>
        <th><a href="?sort=sum">Součet Spotřebovaných</a></th>
        <th>Detail</th>
    </tr>
    </tfoot>
</table>
<h2>100 nejvyšších rozhodnutí</h2>
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
    <?php
    foreach ($zdroj_biggest as $d) {
        $displayDotace = $d->Dotace->projektNazev;
        if ($d->Dotace->projekKod === $d->Dotace->projektIdnetifikator && !empty($d->Dotace->projektKod) && !empty($d->Dotace->projektIdnetifikator)) {
            $displayDotace .= "<br/>(" . $d->Dotace->projektKod . ")";
        } else if (!empty($d->Dotace->projektKod) && !empty($d->Dotace->projektIdnetifikator)) {
            $displayDotace .= "<br/>(" . $d->Dotace->projektKod . ", " . $d->Dotace->projektIdnetifikator . ")";
        } else if (!empty($d->Dotace->projektIdnetifikator)) {
            $displayDotace .= "<br/>(" . $d->Dotace->projektIdnetifikator . ")";
        }
        if (strpos($displayDotace, '<br/>') === 0) {
            $displayDotace = substr($displayDotace, 5);
        }
        ?>
        <tr>
            <td><?= $this->Html->link($d->Dotace->PrijemcePomoci->obchodniJmeno, '/detail-prijemce-pomoci/' . $d->Dotace->PrijemcePomoci->idPrijemce) ?></td>
            <td><?= $this->Html->link($displayDotace, '/detail-dotace/' . $d->Dotace->idDotace, ['escape' => false]) ?></td>
            <td style="text-align: right"><?= Number::currency($d->castkaRozhodnuta) ?></td>
            <td style="text-align: right"><?= !empty($d->RozpoctoveObdobi) ? Number::currency($d->RozpoctoveObdobi->castkaSpotrebovana) : 'N/A' ?></td>
            <td><?= $d->rokRozhodnuti ?></td>
            <td><?= $d->CleneniFinancnichProstredku->financniProstredekCleneniNazev ?></td>
            <td><?= $d->FinancniZdroj->financniZdrojNazev ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <th>Příjemce Pomoci</th>
        <th>Dotace (kod nebo identifikator projektu)</th>
        <th>Částka Rozhodnutá</th>
        <th>Částka Spotřebovaná</th>
        <th>Rok</th>
        <th>Členění finančních prostředků</th>
        <th>Finanční Zdroj</th>
    </tr>
    </tfoot>
</table>