<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Ucel Znakv01'), ['action' => 'edit', $ciselnikUcelZnakv01->idUcelZnak]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Ucel Znakv01'), ['action' => 'delete', $ciselnikUcelZnakv01->idUcelZnak], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikUcelZnakv01->idUcelZnak)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Ucel Znakv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Ucel Znakv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikUcelZnakv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikUcelZnakv01->idUcelZnak) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdUcelZnak') ?></th>
            <td><?= h($ciselnikUcelZnakv01->idUcelZnak) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UcelZnakNazev') ?></th>
            <td><?= h($ciselnikUcelZnakv01->ucelZnakNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UcelZnakKod') ?></th>
            <td><?= $this->Number->format($ciselnikUcelZnakv01->ucelZnakKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatniRozpocetKapitolaKod') ?></th>
            <td><?= $this->Number->format($ciselnikUcelZnakv01->statniRozpocetKapitolaKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikUcelZnakv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikUcelZnakv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
