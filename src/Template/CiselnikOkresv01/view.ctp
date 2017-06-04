<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Okresv01'), ['action' => 'edit', $ciselnikOkresv01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Okresv01'), ['action' => 'delete', $ciselnikOkresv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikOkresv01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Okresv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Okresv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikOkresv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikOkresv01->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($ciselnikOkresv01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OkresNazev') ?></th>
            <td><?= h($ciselnikOkresv01->okresNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OkresNutsKod') ?></th>
            <td><?= h($ciselnikOkresv01->okresNutsKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('KrajNad') ?></th>
            <td><?= h($ciselnikOkresv01->krajNad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('VuscNad') ?></th>
            <td><?= h($ciselnikOkresv01->vuscNad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OkresKod') ?></th>
            <td><?= $this->Number->format($ciselnikOkresv01->okresKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GlobalniNavrhZmenaIdentifikator') ?></th>
            <td><?= $this->Number->format($ciselnikOkresv01->globalniNavrhZmenaIdentifikator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TransakceIdentifikator') ?></th>
            <td><?= $this->Number->format($ciselnikOkresv01->transakceIdentifikator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikOkresv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikOkresv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NespravnostIndikator') ?></th>
            <td><?= $ciselnikOkresv01->nespravnostIndikator ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
