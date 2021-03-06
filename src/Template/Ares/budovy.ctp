<?php
/**
 * @var AppView $this
 */
$this->set('title', 'Agregace příjemců dotací podle adresy');

use App\View\AppView; ?>

<table class="datatable" data-ajax="<?= $this->request->getRequestTarget() ?>">
    <thead>
    <tr>
        <th>Budova adresa</th>
        <th>PSČ</th>
        <th>Počet příjemců dotací</th>
        <th>Počet dotací</th>
        <th data-type="currency">Součet CEDR-III Rozhodnuto</th>
        <th data-type="currency">Součet CEDR-III Požadováno</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
</table>