<?php

$this->set('title', $data->prioritaNazev . ' (kód: ' . $data->prioritaKod . ') - MMR priorita');
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
        <td>Název Priority</td>
        <td><?= $data->prioritaNazev ?></td>
    </tr>

    <tr>
        <td>Kód Priority</td>
        <td><?= $data->prioritaKod ?></td>
    </tr>

    <?php if (!empty($data->prioritaCislo)) { ?>
        <tr>
            <td>Číslo Priority</td>
            <td><?= $data->prioritaCislo ?></td>
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
        <td>Operační Program MMR</td>
        <td><?= $this->Html->link($data->MmrOperacniProgram->operacaniProgramNazev . ' (' . $data->MmrOperacniProgram->operacaniProgramKod . ')', '/detail-mmr-operacni-program/?id=' . $data->idOperacniProgram) ?></td>
    </tr>

    <tr>
        <td>Odkaz na CEDR</td>
        <td><?= $this->Html->link($data->idPriorita) ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <td>Vlastnost</td>
        <td>Hodnota</td>
    </tr>
    </tfoot>
</table>
