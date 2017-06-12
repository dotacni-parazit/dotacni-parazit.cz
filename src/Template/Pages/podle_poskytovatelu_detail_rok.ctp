<?php
use Cake\I18n\Number;

?>
<h1><?= $year ?> - <?= $poskytovatel->dotacePoskytovatelNazev ?> - Poskytovatel Dotací</h1>
<div>
    Součet za rok <?= $year ?>: <?= Number::currency($year_sum) ?>
</div>
<br/>
<br/>
<h2>Rozhodnutí/Dotace za rok <?= $year ?></h2>
<table>
    <thead>
    <tr>
        <th>Příjemce Pomoci</th>
        <th>Dotace (kod nebo identifikator projektu)</th>
        <th>Částka</th>
        <th>Rok</th>
        <th>Členění finančních prostředků</th>
        <th>Finanční Zdroj</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $d) {
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