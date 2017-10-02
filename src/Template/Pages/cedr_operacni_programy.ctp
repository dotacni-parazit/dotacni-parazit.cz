<?php

use Cake\I18n\Number;

$this->set('title', 'CEDR III - Ostatní Programy');
?>
<table class="datatable">
    <thead>
    <tr>
        <th>Název</th>
        <th>Kód Programu</th>
        <th>Číslo Programu</th>
        <th>Počet evidovaných dotací</th>
        <th>Platnost Do</th>
        <th>Součet rozhodnutí Spotřebováno</th>
        <th class="nosearch">Otevřít</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($cedr as $c) {
        ?>
        <tr>
            <td><?= $this->Html->link($c->operacaniProgramNazev, '/detail-cedr-operacni-program/?id=' . $c->idOperacniProgram) ?></td>
            <td><?= $c->operacaniProgramKod ?></td>
            <td><?= $c->operacaniProgramCislo ?></td>
            <td><?= $counts[$c->idOperacniProgram] ?></td>
            <td><?= $c->zaznamPlatnostDoDatum->year ?></td>
            <td><?= Number::currency(isset($sums[$c->idOperacniProgram]) ? $sums[$c->idOperacniProgram] : 0) ?></td>
            <td><?= $this->Html->link('Otevřít', '/detail-cedr-operacni-program/?id=' . $c->idOperacniProgram) ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>

    <tfoot>
    <tr>
        <td>Název</td>
        <td>Kód Programu</td>
        <td>Číslo Programu</td>
        <td>Počet evidovaných dotací</td>
        <td>Platnost Do</td>
        <td>Součet rozhodnutí Spotřebováno</td>
        <td>Otevřít</td>
    </tr>
    </tfoot>
</table>
