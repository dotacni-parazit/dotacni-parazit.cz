<?php
use Cake\I18n\Number;

$jmeno_prijemce = empty($prijemce->obchodniJmeno) ? $prijemce->jmeno . ' ' . $prijemce->prijmeni : $prijemce->obchodniJmeno;

$this->set('title', $jmeno_prijemce . ' - Příjemce Pomoci');
?>

<h1><?= $jmeno_prijemce ?>
    -
    Příjemce Pomoci</h1>
<table>
    <thead>
    <tr>
        <th>Údaj</th>
        <th>Obsah</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>Název Příjemce (obchodní jméno)</td>
        <td><?= $prijemce->obchodniJmeno ?></td>
    </tr>

    <tr>
        <td>IČ (IČO)</td>
        <td><?= $prijemce->ico ?></td>
    </tr>

    <tr>
        <td>Právní Forma</td>
        <td><?= empty($prijemce->PravniForma) ? 'Nevyplněno' : $prijemce->PravniForma->pravniFormaNazev ?></td>
    </tr>

    <tr>
        <td>Stát</td>
        <td><?= $prijemce->Stat->statNazev ?></td>
    </tr>

    <tr>
        <td>Ekonomický Subjekt</td>
        <td><?= empty($prijemce->EkonomikaSubjekt) ? 'Nevyplněno' : $prijemce->EkonomikaSubjekt->id ?></td>
    </tr>

    <tr>
        <td>Rok Narození</td>
        <td><?= $prijemce->rokNarozeni ?></td>
    </tr>

    <tr>
        <td>Jméno</td>
        <td><?= $prijemce->jmeno ?></td>
    </tr>

    <tr>
        <td>Příjmení</td>
        <td><?= $prijemce->prijmeni ?></td>
    </tr>

    <tr>
        <td>Bydliště</td>
        <td><?= (empty($prijemce->Osoba) || empty($prijemce->Osoba->Obec)) ? 'Nevyplněno' : ($prijemce->Osoba->Obec->obecNazev . ' (NUTS: ' . $prijemce->Osoba->Obec->obecNutsKod . ')') ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <th>Údaj</th>
        <th>Obsah</th>
    </tr>
    </tfoot>
</table>

<h2>Rozhodnutí/Dotace</h2>
<table>
    <thead>
    <tr>
        <th>Dotace (kod nebo identifikator projektu)</th>
        <th>Částka Požadovaná</th>
        <th>Částka Rozhodnutá</th>
        <th>Rok</th>
        <th>Členění finančních prostředků</th>
        <th>Finanční Zdroj</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($dotace as $d) {
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
            <td><?= $this->Html->link($displayDotace, '/detail-dotace/' . $d->Dotace->idDotace, ['escape' => false]) ?></td>
            <td><?= Number::currency($d->castkaPozadovana) ?></td>
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
        <th>Dotace (kod nebo identifikator projektu)</th>
        <th>Částka Požadovaná</th>
        <th>Částka Rozhodnutá</th>
        <th>Rok</th>
        <th>Členění finančních prostředků</th>
        <th>Finanční Zdroj</th>
    </tr>
    </tfoot>