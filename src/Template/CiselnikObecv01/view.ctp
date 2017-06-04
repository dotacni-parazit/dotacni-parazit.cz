<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Obecv01'), ['action' => 'edit', $ciselnikObecv01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Obecv01'), ['action' => 'delete', $ciselnikObecv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikObecv01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Obecv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Obecv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikObecv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikObecv01->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($ciselnikObecv01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ObecNutsKod') ?></th>
            <td><?= h($ciselnikObecv01->obecNutsKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ObecNazev') ?></th>
            <td><?= h($ciselnikObecv01->obecNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OkresNad') ?></th>
            <td><?= h($ciselnikObecv01->okresNad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pad2') ?></th>
            <td><?= h($ciselnikObecv01->pad2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pad3') ?></th>
            <td><?= h($ciselnikObecv01->pad3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pad4') ?></th>
            <td><?= h($ciselnikObecv01->pad4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pad5') ?></th>
            <td><?= h($ciselnikObecv01->pad5) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pad6') ?></th>
            <td><?= h($ciselnikObecv01->pad6) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pad7') ?></th>
            <td><?= h($ciselnikObecv01->pad7) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ObecKod') ?></th>
            <td><?= $this->Number->format($ciselnikObecv01->obecKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GlobalniNavrhZmenaIdentifikator') ?></th>
            <td><?= $this->Number->format($ciselnikObecv01->globalniNavrhZmenaIdentifikator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TransakceIdentifikator') ?></th>
            <td><?= $this->Number->format($ciselnikObecv01->transakceIdentifikator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikObecv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikObecv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NespravnostIndikator') ?></th>
            <td><?= $ciselnikObecv01->nespravnostIndikator ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
