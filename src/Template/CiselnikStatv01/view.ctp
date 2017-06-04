<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Statv01'), ['action' => 'edit', $ciselnikStatv01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Statv01'), ['action' => 'delete', $ciselnikStatv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikStatv01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Statv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Statv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikStatv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikStatv01->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($ciselnikStatv01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatKod3Znaky') ?></th>
            <td><?= h($ciselnikStatv01->statKod3Znaky) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatKodOmezeny') ?></th>
            <td><?= h($ciselnikStatv01->statKodOmezeny) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatNazev') ?></th>
            <td><?= h($ciselnikStatv01->statNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatNazevZkraceny') ?></th>
            <td><?= h($ciselnikStatv01->statNazevZkraceny) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatNazevEn') ?></th>
            <td><?= h($ciselnikStatv01->statNazevEn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatNazevZkracenyEn') ?></th>
            <td><?= h($ciselnikStatv01->statNazevZkracenyEn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatKod3Cisla') ?></th>
            <td><?= $this->Number->format($ciselnikStatv01->statKod3Cisla) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikStatv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikStatv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
