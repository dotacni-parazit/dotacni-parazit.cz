<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Cedr Opatreniv01'), ['action' => 'edit', $ciselnikCedrOpatreniv01->idOpatreni]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Cedr Opatreniv01'), ['action' => 'delete', $ciselnikCedrOpatreniv01->idOpatreni], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikCedrOpatreniv01->idOpatreni)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Cedr Opatreniv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Cedr Opatreniv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikCedrOpatreniv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikCedrOpatreniv01->idOpatreni) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdOpatreni') ?></th>
            <td><?= h($ciselnikCedrOpatreniv01->idOpatreni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdPriorita') ?></th>
            <td><?= h($ciselnikCedrOpatreniv01->idPriorita) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OpatreniKod') ?></th>
            <td><?= h($ciselnikCedrOpatreniv01->opatreniKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OpatreniNazev') ?></th>
            <td><?= h($ciselnikCedrOpatreniv01->opatreniNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OpatreniCislo') ?></th>
            <td><?= $this->Number->format($ciselnikCedrOpatreniv01->opatreniCislo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikCedrOpatreniv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikCedrOpatreniv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
