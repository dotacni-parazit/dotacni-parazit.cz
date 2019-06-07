<?php
/**
 * @var AppView $this
 */

use App\View\AppView; ?>
<table id="datatable" class="datatable_simple" data-ajax="<?= $this->request->getRequestTarget() ?>">
    <thead>
    <tr>
        <th>Poskytovatel</th>
        <th class="nosearch text-right" data-type="currency">Součet rozhodnutých částek</th>
        <th class="nosearch text-right" data-type="currency">Součet spotřebovaných částek</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <tr>
        <td>Poskytovatel</td>
        <td class="text-right">Součet poskytnutých dotací</td>
        <td class="text-right">Součet spotřebovaných částek</td>
    </tr>
    </tfoot>
</table>