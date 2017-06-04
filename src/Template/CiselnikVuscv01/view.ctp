<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Vuscv01'), ['action' => 'edit', $ciselnikVuscv01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Vuscv01'), ['action' => 'delete', $ciselnikVuscv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikVuscv01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Vuscv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Vuscv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikVuscv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikVuscv01->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($ciselnikVuscv01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('KrajNutsKod') ?></th>
            <td><?= h($ciselnikVuscv01->krajNutsKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('VuscNazev') ?></th>
            <td><?= h($ciselnikVuscv01->vuscNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('VuscKod') ?></th>
            <td><?= $this->Number->format($ciselnikVuscv01->vuscKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GlobalniNavrhZmenaIdentifikator') ?></th>
            <td><?= $this->Number->format($ciselnikVuscv01->globalniNavrhZmenaIdentifikator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TransakceIdentifikator') ?></th>
            <td><?= $this->Number->format($ciselnikVuscv01->transakceIdentifikator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikVuscv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikVuscv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NespravnostIndikator') ?></th>
            <td><?= $ciselnikVuscv01->nespravnostIndikator ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
