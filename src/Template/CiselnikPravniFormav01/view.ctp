<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Pravni Formav01'), ['action' => 'edit', $ciselnikPravniFormav01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Pravni Formav01'), ['action' => 'delete', $ciselnikPravniFormav01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikPravniFormav01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Pravni Formav01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Pravni Formav01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikPravniFormav01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikPravniFormav01->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($ciselnikPravniFormav01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PravniFormaNazev') ?></th>
            <td><?= h($ciselnikPravniFormav01->pravniFormaNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PravniFormaNazevZkraceny') ?></th>
            <td><?= h($ciselnikPravniFormav01->pravniFormaNazevZkraceny) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PravniFormaKod') ?></th>
            <td><?= $this->Number->format($ciselnikPravniFormav01->pravniFormaKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PravniFormaTypKod') ?></th>
            <td><?= $this->Number->format($ciselnikPravniFormav01->pravniFormaTypKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikPravniFormav01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikPravniFormav01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
