<?php
$this->set('title', 'Operační programy MMR');
?>
<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th>Název</th>
        <th>Kód Programu</th>
        <th>Počet evidovaných dotací</th>
        <th>Platnost Od</th>
        <th>Platnost Do</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($mmr as $c) {
        ?>
        <tr>
            <td><?= $this->Html->link($c->operacaniProgramNazev, '/detail-mmr-operacni-program/?id='.$c->idOperacniProgram) ?></td>
            <td><?= $c->operacaniProgramKod ?></td>
            <td><?= $counts[$c->idOperacniProgram] ?></td>
            <td><?= $c->zaznamPlatnostOdDatum->year ?></td>
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
        <td>Počet evidovaných dotací</td>
        <td>Platnost Od</td>
        <td>Platnost Do</td>
    </tr>
    </tfoot>
</table>
