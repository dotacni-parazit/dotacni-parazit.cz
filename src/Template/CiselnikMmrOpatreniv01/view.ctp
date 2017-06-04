<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Mmr Opatreniv01'), ['action' => 'edit', $ciselnikMmrOpatreniv01->idOpatreni]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Mmr Opatreniv01'), ['action' => 'delete', $ciselnikMmrOpatreniv01->idOpatreni], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikMmrOpatreniv01->idOpatreni)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Mmr Opatreniv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Mmr Opatreniv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikMmrOpatreniv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikMmrOpatreniv01->idOpatreni) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdOpatreni') ?></th>
            <td><?= h($ciselnikMmrOpatreniv01->idOpatreni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdPriorita') ?></th>
            <td><?= h($ciselnikMmrOpatreniv01->idPriorita) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OpatreniKod') ?></th>
            <td><?= h($ciselnikMmrOpatreniv01->opatreniKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OpatreniNazev') ?></th>
            <td><?= h($ciselnikMmrOpatreniv01->opatreniNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikMmrOpatreniv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikMmrOpatreniv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OpatreniCislo') ?></th>
            <td><?= $ciselnikMmrOpatreniv01->opatreniCislo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
