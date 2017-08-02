<?php

$this->set('title', $data->podOpatreniNazev . ' (kód: ' . $data->podOpatreniKod . ') - MMR PodOpatření');
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
        <td>Název PodOpatření</td>
        <td><?= $data->podOpatreniNazev ?></td>
    </tr>

    <tr>
        <td>Kód PodOpatření</td>
        <td><?= $data->podOpatreniKod ?></td>
    </tr>

    <tr>
        <td>Číslo PodOpatření</td>
        <td><?= $data->podOpatreniCislo ?></td>
    </tr>

    <tr>
        <td>Platnost Od</td>
        <td><?= date('d. m. Y', $data->zaznamPlatnostOdDatum->timestamp) ?></td>
    </tr>

    <tr>
        <td>Platnost Do</td>
        <td><?= date('d. m. Y', $data->zaznamPlatnostDoDatum->timestamp) ?></td>
    </tr>

    <tr>
        <td>Nadřazené Opatření MMR</td>
        <td><?= $this->Html->link($data->MmrOpatreni->opatreniNazev . ' (' . $data->MmrOpatreni->opatreniKod . ')', '/detail-mmr-opatreni/?id=' . $data->idOpatreni) ?></td>
    </tr>

    <tr>
        <td>Odkaz na CEDR</td>
        <td><?= $this->Html->link($data->idPodOpatreni) ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <td>Vlastnost</td>
        <td>Hodnota</td>
    </tr>
    </tfoot>
</table>
