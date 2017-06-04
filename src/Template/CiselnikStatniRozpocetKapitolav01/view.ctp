<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Statni Rozpocet Kapitolav01'), ['action' => 'edit', $ciselnikStatniRozpocetKapitolav01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Statni Rozpocet Kapitolav01'), ['action' => 'delete', $ciselnikStatniRozpocetKapitolav01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikStatniRozpocetKapitolav01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Statni Rozpocet Kapitolav01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Statni Rozpocet Kapitolav01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikStatniRozpocetKapitolav01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikStatniRozpocetKapitolav01->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($ciselnikStatniRozpocetKapitolav01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatniRozpocetKapitolaNazev') ?></th>
            <td><?= h($ciselnikStatniRozpocetKapitolav01->statniRozpocetKapitolaNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatniRozpocetKapitolaKod') ?></th>
            <td><?= $this->Number->format($ciselnikStatniRozpocetKapitolav01->statniRozpocetKapitolaKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikStatniRozpocetKapitolav01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikStatniRozpocetKapitolav01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
