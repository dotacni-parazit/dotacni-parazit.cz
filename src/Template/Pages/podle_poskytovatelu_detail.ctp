<?php
use Cake\I18n\Number;

$this->Html->script('datatable.js', ['block' => true]);
$this->set('title', $poskytovatel->dotacePoskytovatelNazev . ' - Poskytovatel Dotací');
?>
<table>
    <thead>
    <tr>
        <th><a href="?sort=year">Rok</a></th>
        <th><a href="?sort=sum">Součet</a></th>
        <th>Detail</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($year_to_sum as $key => $value) {
        ?>
        <tr>
            <td><?= $this->Html->link($key, '/podle-poskytovatelu/' . $poskytovatel->dotacePoskytovatelKod . '/rok/' . $key) ?></td>
            <td><?= $this->Html->link(Number::currency($value, 'CZK', ['zero' => '']), '/podle-poskytovatelu/' . $poskytovatel->dotacePoskytovatelKod . '/rok/' . $key) ?></td>
            <td><?= $this->Html->link('Otevřít', '/podle-poskytovatelu/' . $poskytovatel->dotacePoskytovatelKod . '/rok/' . $key) ?></td>
        </tr>
        <?php
    }
    ?>

    <tr>
        <td><?= $this->Html->link('Součet', '/podle-poskytovatelu/' . $poskytovatel->dotacePoskytovatelKod . '/rok') ?></td>
        <td><?= $this->Html->link(Number::currency($sum, 'CZK', ['zero' => '']), '/podle-poskytovatelu/' . $poskytovatel->dotacePoskytovatelKod . '/complete') ?></td>
        <td><?= $this->Html->link('Otevřít Kompletní Výpis', '/podle-poskytovatelu/' . $poskytovatel->dotacePoskytovatelKod . '/complete') ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <th><a href="?sort=year">Rok</a></th>
        <th><a href="?sort=sum">Součet</a></th>
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
        <th data-type="currency">Částka</th>
        <th data-type="year">Rok</th>
        <th data-type="string">Členění finančních prostředků</th>
        <th data-type="string">Finanční Zdroj</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($poskytovatel_biggest as $d) {
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
            <td><?= Number::currency($d->castkaRozhodnuta) ?></td>
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
        <th>Částka</th>
        <th>Rok</th>
        <th>Členění finančních prostředků</th>
        <th>Finanční Zdroj</th>
    </tr>
    </tfoot>
</table>