<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Financni Zdrojv01'), ['action' => 'edit', $ciselnikFinancniZdrojv01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Financni Zdrojv01'), ['action' => 'delete', $ciselnikFinancniZdrojv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikFinancniZdrojv01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Financni Zdrojv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Financni Zdrojv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikFinancniZdrojv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikFinancniZdrojv01->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($ciselnikFinancniZdrojv01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FinancniZdrojKod') ?></th>
            <td><?= h($ciselnikFinancniZdrojv01->financniZdrojKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FinancniZdrojNadrizenyKod') ?></th>
            <td><?= h($ciselnikFinancniZdrojv01->financniZdrojNadrizenyKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FinancniZdrojNazev') ?></th>
            <td><?= h($ciselnikFinancniZdrojv01->financniZdrojNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikFinancniZdrojv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikFinancniZdrojv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
