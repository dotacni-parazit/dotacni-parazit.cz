<?php
$this->set('title', 'Kapitoly Státního Rozpočtu - Ukazatele');
?>

<table class="datatable">
    <thead>
    <tr>
        <th data-type="html">Název Ukazatele</th>
        <th data-type="html">Kód Ukazatele</th>
        <th data-type="html">Kapitola Státního Rozpočtu</th>
        <th>Počet Dotačních Titulů</th>
        <th data-type="datetime">Platnost</th>
        <th data-type="html">Otevřít</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $d) { ?>
        <tr>
            <td><?= $this->Html->link($d->statniRozpocetUkazatelNazev, '/kapitoly-statniho-rozpoctu-ukazatele/' . $d->zaznamPlatnostOdDatum->year . '/'. $d->statniRozpocetUkazatelKod) ?></td>
            <td><?= $this->Html->link($d->statniRozpocetUkazatelKod, '/kapitoly-statniho-rozpoctu-ukazatele/' . $d->zaznamPlatnostOdDatum->year . '/'. $d->statniRozpocetUkazatelKod) ?></td>
            <td><?= $this->Html->link($d->statniRozpocetKapitolaKod, '/kapitoly-statniho-rozpoctu-ukazatele/' . $d->zaznamPlatnostOdDatum->year . '/'. $d->statniRozpocetUkazatelKod) ?></td>
            <td><?= isset($ukazatele_counts[$d->id]) ? $ukazatele_counts[$d->id] : 0 ?></td>
            <td><?= $d->zaznamPlatnostOdDatum->year ?></td>
            <td><?= $this->Html->link('Otevřít', '/kapitoly-statniho-rozpoctu-ukazatele/' . $d->zaznamPlatnostOdDatum->year . '/' . $d->statniRozpocetUkazatelKod) ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
        <td>Název Ukazatele</td>
        <td>Kód Ukazatele</td>
        <td>Kapitola Státního Rozpočtu</td>
        <td>Počet Dotačních Titulů</td>
        <td>Platnost</td>
        <td>Otevřít</td>
    </tr>
    </tfoot>
</table>