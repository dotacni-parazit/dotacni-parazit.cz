<?php
$this->set('title', 'Operační programy MMR');
?>
<table>
    <thead>
    <tr>
        <th>Název</th>
        <th>Kód Programu</th>
        <th>Číslo Programu</th>
        <th>Platnost Do</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($mmr as $c) {
        ?>
        <tr>
            <td><?= $this->Html->link($c->operacaniProgramNazev, $c->idOperacniProgram) ?></td>
            <td><?= $c->operacaniProgramKod ?></td>
            <td><?= $c->operacaniProgramCislo ?></td>
            <td><?= $c->zaznamPlatnostDoDatum->year ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>

    <tfoot>
    <tr>
        <th>Název</th>
        <th>Kód Programu</th>
        <th>Číslo Programu</th>
        <th>Platnost Do</th>
    </tr>
    </tfoot>
</table>
