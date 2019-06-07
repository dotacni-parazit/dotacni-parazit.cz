<?php
/**
 * @var AppView $this
 */

$this->set('title', $source->zdroj);

use App\View\AppView; ?>

<table class="datatable" data-ajax="<?= $this->request->getRequestTarget() ?>">
    <thead>
    <tr>
        <th>Jméno Příjemce</th>
        <th>IČO</th>
        <th>Okres</th>
        <th>Obec</th>
        <th>Opatření</th>
        <th data-type="currency">Částka (tuzemské fondy)</th>
        <th data-type="currency">Částka (EU fondy)</th>
        <th data-type="currency">Částka (celkem)</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
    <tr>
        <td>Jméno Příjemce</td>
        <td>IČO</td>
        <td>Okres</td>
        <td>Obec</td>
        <td>Opatření</td>
        <td>Částka (tuzemské fondy)</td>
        <td>Částka (EU fondy)</td>
        <td>Částka (celkem)</td>
    </tr>
    </tfoot>
</table>
