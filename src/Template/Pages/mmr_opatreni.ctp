<?php

$this->set('title', $data->opatreniNazev . ' (kód: ' . $data->opatreniKod . ') - MMR Opatření');
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
        <td>Název Opatření</td>
        <td><?= $data->opatreniNazev ?></td>
    </tr>

    <tr>
        <td>Kód Opatření</td>
        <td><?= $data->opatreniKod ?></td>
    </tr>

    <?php if (!empty($data->opatreniCislo)) { ?>
        <tr>
            <td>Číslo Opatření</td>
            <td><?= $data->opatreniCislo ?></td>
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
        <td>Nadřazená Priorita MMR</td>
        <td><?= $this->Html->link($data->MmrPriorita->prioritaNazev . ' (' . $data->MmrPriorita->prioritaKod . ')', '/detail-mmr-priorita/?id=' . $data->idPriorita) ?></td>
    </tr>

    <tr>
        <td>Odkaz na CEDR</td>
        <td><?= $this->Html->link($data->idOpatreni) ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <td>Vlastnost</td>
        <td>Hodnota</td>
    </tr>
    </tfoot>
</table>
