<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Dotace Titulv01'), ['action' => 'edit', $ciselnikDotaceTitulv01->idDotaceTitul]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Dotace Titulv01'), ['action' => 'delete', $ciselnikDotaceTitulv01->idDotaceTitul], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikDotaceTitulv01->idDotaceTitul)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Dotace Titulv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Dotace Titulv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikDotaceTitulv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikDotaceTitulv01->idDotaceTitul) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdDotaceTitul') ?></th>
            <td><?= h($ciselnikDotaceTitulv01->idDotaceTitul) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotaceTitulVlastniKod') ?></th>
            <td><?= h($ciselnikDotaceTitulv01->dotaceTitulVlastniKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotaceTitulNazev') ?></th>
            <td><?= h($ciselnikDotaceTitulv01->dotaceTitulNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotaceTitulNazevZkraceny') ?></th>
            <td><?= h($ciselnikDotaceTitulv01->dotaceTitulNazevZkraceny) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotaceTitulKod') ?></th>
            <td><?= $this->Number->format($ciselnikDotaceTitulv01->dotaceTitulKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatniRozpocetKapitolaKod') ?></th>
            <td><?= $this->Number->format($ciselnikDotaceTitulv01->statniRozpocetKapitolaKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikDotaceTitulv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikDotaceTitulv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
