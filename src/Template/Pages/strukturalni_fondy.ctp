<?php

use Cake\I18n\Number;

?>

<table class="datatable">
    <thead>
    <tr>
        <th>Číslo a Název Programu</th>
        <th>Číslo Prioritní Osy</th>
        <th>Číslo Oblasti Podpory</th>
        <th>Číslo Projektu</th>
        <th>Název Projektu</th>
        <th>Žadatel (+IČO)</th>
        <th>Právní Forma</th>
        <th>Právní Forma Skupina</th>
        <th data-type="date">Datum Podpisu Smlouvy</th>
        <th data-type="currency">Veřejné Zdroje Celkem</th>
        <th data-type="currency">Vyúčtované Veřejné Celkem</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $d) { ?>
        <tr>
            <td><?= $d->cisloANazevProgramu ?></td>
            <td><?= $d->cisloPrioritniOsy ?></td>
            <td><?= $d->cisloOblastiPodpory ?></td>
            <td><?= $d->cisloProjektu ?></td>
            <td><?= $d->nazevProjektu ?></td>
            <td><?= $d->zadatel . ' (IČO:' . $d->zadatelIco . ')' ?></td>
            <td><?= $d->pravniForma ?></td>
            <td><?= $d->pravniFormaSkupina ?></td>
            <td><?= $d->datumPodpisuSmlouvy->nice() ?></td>
            <td><?= Number::currency($d->verejneZdrojeCelkem) ?></td>
            <td><?= Number::currency($d->vyuctovaneVerejneCelkem) ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
        <td>Číslo a Název Programu</td>
        <td>Číslo Prioritní Osy</td>
        <td>Číslo Oblasti Podpory</td>
        <td>Číslo Projektu</td>
        <td>Název Projektu</td>
        <td>Žadatel (+IČO)</td>
        <td>Právní Forma</td>
        <td>Právní Forma Skupina</td>
        <td>Datum Podpisu Smlouvy</td>
        <td>Veřejné Zdroje Celkem</td>
        <td>Vyúčtované Veřejné Celkem</td>
    </tr>
    </tfoot>
</table>
