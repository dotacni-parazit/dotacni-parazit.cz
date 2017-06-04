<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Statni Rozpocet Ukazatelv01'), ['action' => 'edit', $ciselnikStatniRozpocetUkazatelv01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Statni Rozpocet Ukazatelv01'), ['action' => 'delete', $ciselnikStatniRozpocetUkazatelv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikStatniRozpocetUkazatelv01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Statni Rozpocet Ukazatelv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Statni Rozpocet Ukazatelv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikStatniRozpocetUkazatelv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikStatniRozpocetUkazatelv01->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($ciselnikStatniRozpocetUkazatelv01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatniRozpocetUkazatelKod') ?></th>
            <td><?= h($ciselnikStatniRozpocetUkazatelv01->statniRozpocetUkazatelKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatniRozpocetUkazatelNadrizenyKod') ?></th>
            <td><?= h($ciselnikStatniRozpocetUkazatelv01->statniRozpocetUkazatelNadrizenyKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatniRozpocetUkazatelNazev') ?></th>
            <td><?= h($ciselnikStatniRozpocetUkazatelv01->statniRozpocetUkazatelNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatniRozpocetKapitolaKod') ?></th>
            <td><?= $this->Number->format($ciselnikStatniRozpocetUkazatelv01->statniRozpocetKapitolaKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikStatniRozpocetUkazatelv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikStatniRozpocetUkazatelv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdStatniRozpocetKapitola') ?></th>
            <td><?= $ciselnikStatniRozpocetUkazatelv01->idStatniRozpocetKapitola ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
