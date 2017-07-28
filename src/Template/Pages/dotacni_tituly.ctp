<?php
$this->set('title', 'Dotační tituly podle kapitoly státního rozpočtu');
$this->Html->script('datatable.js', ['block' => true]);
?>

<table id="datatable">
    <thead>
    <tr>
        <th data-type="html">Kapitola Státního Rozpočtu</th>
        <th data-type="number" class="large-1 medium-1">Kód Kapitoly</th>
        <th data-type="html">Dotační Titul</th>
        <th data-type="number" class="large-1 medium-1">Kód Titulu</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $d) { ?>
        <tr>
            <td><?= $this->Html->link($d->CiselnikStatniRozpocetKapitola->statniRozpocetKapitolaNazev, '/podle-zdroje-financi/t' . $d->CiselnikStatniRozpocetKapitola->statniRozpocetKapitolaKod) ?></td>
            <td><?= $this->Html->link($d->CiselnikStatniRozpocetKapitola->statniRozpocetKapitolaKod, '/podle-zdroje-financi/t' . $d->CiselnikStatniRozpocetKapitola->statniRozpocetKapitolaKod) ?></td>
            <td><?= $this->Html->link($d->dotaceTitulNazev, '/detail-dotacni-titul/' . $d->dotaceTitulKod) ?></td>
            <td><?= $this->Html->link($d->dotaceTitulKod, '/detail-dotacni-titul/' . $d->dotaceTitulKod) ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
        <td>Kapitola Státního Rozpočtu</td>
        <td>Kód Kapitoly</td>
        <td>Dotační Titul</td>
        <td>Kód Titulu</td>
    </tr>
    </tfoot>
</table>