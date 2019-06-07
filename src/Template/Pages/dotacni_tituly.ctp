<?php
/**
 * @var AppView $this
 */
$this->set('title', 'CEDR III - Dotační Tituly');

use App\View\AppView; ?>

<table id="datatable" data-ajax="<?= $this->request->getRequestTarget() ?>">
    <thead>
    <tr>
        <th data-type="html">Kapitola Státního Rozpočtu</th>
        <th data-type="number" class="large-1 medium-1">Kód Kapitoly</th>
        <th data-type="html">Dotační Titul</th>
        <th data-type="number" class="large-1 medium-1">Kód Titulu</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <tr>
        <td>Kapitola Státního Rozpočtu</td>
        <td>Kód Kapitoly</td>
        <td>Dotační Titul</td>
        <td>Kód Titulu</td>
    </tr>
    </tfoot>
</table>