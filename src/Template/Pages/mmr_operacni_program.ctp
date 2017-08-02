<?php

$this->set('title', $data->operacaniProgramNazev . ' (kód: ' . $data->operacaniProgramKod . ') - MMR Operační Program');
?>

<table>
    <thead>
    <tr>
        <th>Vlastnost</th>
        <th>Hodnota</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>Název Operačního Programmu</td>
        <td><?= $data->operacaniProgramNazev ?></td>
    </tr>

    <tr>
        <td>Kód OP</td>
        <td><?= $data->operacaniProgramKod ?></td>
    </tr>

    <?php if (!empty($data->operacaniProgramCislo)) { ?>
        <tr>
            <td>Číslo OP</td>
            <td><?= $data->operacaniProgramCislo ?></td>
        </tr>
    <?php } ?>

    <tr>
        <td>Platnost Od</td>
        <td><?= date('d. m. Y', $data->zaznamPlatnostOdDatum->timestamp) ?></td>
    </tr>

    <tr>
        <td>Platnost Do</td>
        <td><?= date('d. m. Y', $data->zaznamPlatnostDoDatum->timestamp) ?></td>
    </tr>

    <tr>
        <td>Odkaz na CEDR</td>
        <td><?= $this->Html->link($data->idOperacniProgram) ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <td>Vlastnost</td>
        <td>Hodnota</td>
    </tr>
    </tfoot>
</table>
