<?php

use Cake\I18n\Number;

$this->set('title', 'CEDR III - Programy MMR');
?>
<table class="datatable">
    <thead>
    <tr>
        <th>Název</th>
        <th>Kód Programu</th>
        <th>Počet evidovaných dotací</th>
        <th>Platnost Od</th>
        <th>Platnost Do</th>
        <th data-type="currency">Součet rozhodnutí Spotřebováno</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($mmr as $c) {
        ?>
        <tr>
            <td><?= $this->Html->link($c->operacaniProgramNazev, '/detail-mmr-operacni-program/?id=' . $c->idOperacniProgram) ?></td>
            <td><?= $c->operacaniProgramKod ?></td>
            <td><?= $counts[$c->idOperacniProgram] ?></td>
            <td><?= $c->zaznamPlatnostOdDatum->year ?></td>
            <td><?= $c->zaznamPlatnostDoDatum->year ?></td>
            <td><?= \App\View\DPUTILS::currency(isset($sums[$c->idOperacniProgram]) ? $sums[$c->idOperacniProgram] : 0) ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>

    <tfoot>
    <tr>
        <td>Název</td>
        <td>Kód Programu</td>
        <td>Počet evidovaných dotací</td>
        <td>Platnost Od</td>
        <td>Platnost Do</td>
        <td>Součet rozhodnutí Spotřebováno</td>
    </tr>
    </tfoot>
</table>
