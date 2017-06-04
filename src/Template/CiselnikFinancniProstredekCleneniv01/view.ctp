<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Financni Prostredek Cleneniv01'), ['action' => 'edit', $ciselnikFinancniProstredekCleneniv01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Financni Prostredek Cleneniv01'), ['action' => 'delete', $ciselnikFinancniProstredekCleneniv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikFinancniProstredekCleneniv01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Financni Prostredek Cleneniv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Financni Prostredek Cleneniv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikFinancniProstredekCleneniv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikFinancniProstredekCleneniv01->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($ciselnikFinancniProstredekCleneniv01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FinancniProstredekCleneniNazev') ?></th>
            <td><?= h($ciselnikFinancniProstredekCleneniv01->financniProstredekCleneniNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FinancniProstredekCleneniKod') ?></th>
            <td><?= $this->Number->format($ciselnikFinancniProstredekCleneniv01->financniProstredekCleneniKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikFinancniProstredekCleneniv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikFinancniProstredekCleneniv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
