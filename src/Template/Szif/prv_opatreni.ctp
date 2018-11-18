<?php
$this->set('title', $this->request->getQuery('name'));
?>

<table class="datatable" data-ajax="<?= $this->request->getAttribute("here") ?>">
    <thead>
    <tr>
        <th>Jméno příjemce</th>
        <th>IČO</th>
        <th>Zdroj Financí</th>
        <th>Okres</th>
        <th>Obec</th>
        <th data-type="currency">Částka (součet celkem)</th>
        <th data-type="currency">Částka (tuzemské fondy)</th>
        <th data-type="currency">Částka (EU fondy)</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
    <tr>
        <td>Jméno příjemce</td>
        <td>IČO</td>
        <td>Zdroj Financí</td>
        <td>Okres</td>
        <td>Obec</td>
        <td>Částka (součet celkem)</td>
        <td>Částka (tuzemské fondy)</td>
        <td>Částka (EU fondy)</td>
    </tr>
    </tfoot>
</table>