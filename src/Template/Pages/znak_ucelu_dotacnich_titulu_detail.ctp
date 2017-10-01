<?php
$this->set('title', $data->ucelZnakNazev);
?>

<table class="datatable datatable_simple" style="width: 100%;">
    <thead>
    <tr>
        <th class="nosearch">Vlastnost</th>
        <th class="nosearch">Hodnota</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>Kód Znaku Účelu</td>
        <td><?= $data->ucelZnakKod ?></td>
    </tr>

    <tr>
        <td>Kapitola Státního Rozpočtu</td>
        <td><?= $data->statniRozpocetKapitolaKod ?></td>
    </tr>

    <tr>
        <td>Odkaz CEDR</td>
        <td><?= $this->Html->link($data->idUcelZnak) ?></td>
    </tr>

    <tr>
        <td>Platnost Od</td>
        <td><?= $data->zaznamPlatnostOdDatum->nice() ?></td>
    </tr>

    <tr>
        <td>Platnost Do</td>
        <td><?= $data->zaznamPlatnostDoDatum->nice() ?></td>
    </tr>

    <tr>
        <td>Dotační Titul</td>
        <td><?= !empty($data->DotacniTituly) ? $this->Html->link($data->DotacniTituly[0]->DotaceTitul->dotaceTitulNazev, '/detail-dotacni-titul/' . $data->DotacniTituly[0]->DotaceTitul->dotaceTitulKod) : "N/A" ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <td>Vlastnost</td>
        <td>Hodnota</td>
    </tr>
    </tfoot>
</table>
