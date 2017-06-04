<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Mmr Pod Opatreniv01'), ['action' => 'edit', $ciselnikMmrPodOpatreniv01->idPodOpatreni]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Mmr Pod Opatreniv01'), ['action' => 'delete', $ciselnikMmrPodOpatreniv01->idPodOpatreni], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikMmrPodOpatreniv01->idPodOpatreni)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Mmr Pod Opatreniv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Mmr Pod Opatreniv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikMmrPodOpatreniv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikMmrPodOpatreniv01->idPodOpatreni) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdPodOpatreni') ?></th>
            <td><?= h($ciselnikMmrPodOpatreniv01->idPodOpatreni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdOpatreni') ?></th>
            <td><?= h($ciselnikMmrPodOpatreniv01->idOpatreni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PodOpatreniNazev') ?></th>
            <td><?= h($ciselnikMmrPodOpatreniv01->podOpatreniNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PodOpatreniCislo') ?></th>
            <td><?= $this->Number->format($ciselnikMmrPodOpatreniv01->podOpatreniCislo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PodOpatreniKod') ?></th>
            <td><?= h($ciselnikMmrPodOpatreniv01->podOpatreniKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikMmrPodOpatreniv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikMmrPodOpatreniv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
