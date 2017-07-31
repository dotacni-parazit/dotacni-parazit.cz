<?php

use Cake\Cache\Cache;
use Cake\I18n\Number;

$this->set('title', $obec->obecNazev . ' - Detail Obce');
?>
<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th>Vlastnost</th>
        <th>Hodnota</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Kód Obce</td>
        <td><?= $obec->obecKod ?></td>
    </tr>
    <tr>
        <td>Kód NUTS</td>
        <td><?= $obec->obecNutsKod ?></td>
    </tr>

    <tr>
        <td>Název Obce</td>
        <td><?= $obec->obecNazev ?></td>
    </tr>

    <tr>
        <td>Platnost Od</td>
        <td><?= $obec->zaznamPlatnostOdDatum->nice() ?></td>
    </tr>

    <tr>
        <td>Platnost Do</td>
        <td><?= $obec->zaznamPlatnostDoDatum->nice() ?></td>
    </tr>

    <tr>
        <td>Nadřazený Okres</td>
        <td><?= $this->Html->link($obec->Okres->okresNazev, '/detail-okres/' . $obec->Okres->okresKod) ?></td>
    </tr>

    <tr>
        <td>Odkaz CEDR-III</td>
        <td><?= $this->Html->link($obec->id) ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <td>Vlastnost</td>
        <td>Hodnota</td>
    </tr>
    </tfoot>
</table>