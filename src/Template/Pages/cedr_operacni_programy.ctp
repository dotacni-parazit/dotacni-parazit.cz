<?php
$this->set('title', 'Operační programy CEDR');
?>
<table class="datatable">
    <thead>
    <tr>
        <th>Název</th>
        <th>Kód Programu</th>
        <th>Číslo Programu</th>
        <th>Počet evidovaných dotací</th>
        <th>Platnost Do</th>
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
    </tr>
    </tfoot>
</table>
