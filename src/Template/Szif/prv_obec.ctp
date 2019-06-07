<?php
/**
 * @var AppView $this
 */
$this->set('title', $name);

use App\View\AppView; ?>
<table class="datatable" data-ajax="<?= $this->request->getRequestTarget() ?>">
    <thead>
    <tr>
        <th>Jméno příjemce</th>
        <th>IČO</th>
        <th>Zdroj Financí</th>
        <th>Opatření</th>
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
        <td>Opatření</td>
        <td>Částka (součet celkem)</td>
        <td>Částka (tuzemské fondy)</td>
        <td>Částka (EU fondy)</td>
    </tr>
    </tfoot>
</table>