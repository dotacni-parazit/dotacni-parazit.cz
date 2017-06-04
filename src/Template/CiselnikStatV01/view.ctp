<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Stat V01'), ['action' => 'edit', $ciselnikStatV01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Stat V01'), ['action' => 'delete', $ciselnikStatV01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikStatV01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Stat V01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Stat V01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikStatV01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikStatV01->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('About') ?></th>
            <td><?= h($ciselnikStatV01->about) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatKod3Znaky') ?></th>
            <td><?= h($ciselnikStatV01->statKod3Znaky) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatKodOmezeny') ?></th>
            <td><?= h($ciselnikStatV01->statKodOmezeny) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatNazev') ?></th>
            <td><?= h($ciselnikStatV01->statNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatNazevZkraceny') ?></th>
            <td><?= h($ciselnikStatV01->statNazevZkraceny) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatCiselnikAxisStatKod') ?></th>
            <td><?= h($ciselnikStatV01->statCiselnikAxisStatKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatNazevEn') ?></th>
            <td><?= h($ciselnikStatV01->statNazevEn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatNazevZkracenyEn') ?></th>
            <td><?= h($ciselnikStatV01->statNazevZkracenyEn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($ciselnikStatV01->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ciselnikStatV01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatKod3Cisla') ?></th>
            <td><?= $this->Number->format($ciselnikStatV01->statKod3Cisla) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikStatV01->zaznamPlatnostDoDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikStatV01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ciselnikStatV01->modified) ?></td>
        </tr>
    </table>
</div>
