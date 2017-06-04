<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Rozpoctova Skladba Paragrafv01'), ['action' => 'edit', $ciselnikRozpoctovaSkladbaParagrafv01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Rozpoctova Skladba Paragrafv01'), ['action' => 'delete', $ciselnikRozpoctovaSkladbaParagrafv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikRozpoctovaSkladbaParagrafv01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Rozpoctova Skladba Paragrafv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Rozpoctova Skladba Paragrafv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikRozpoctovaSkladbaParagrafv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikRozpoctovaSkladbaParagrafv01->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($ciselnikRozpoctovaSkladbaParagrafv01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RozpoctovaSkladbaParagrafNazev') ?></th>
            <td><?= h($ciselnikRozpoctovaSkladbaParagrafv01->rozpoctovaSkladbaParagrafNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RozpoctovaSkladbaParagrafKod') ?></th>
            <td><?= $this->Number->format($ciselnikRozpoctovaSkladbaParagrafv01->rozpoctovaSkladbaParagrafKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikRozpoctovaSkladbaParagrafv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikRozpoctovaSkladbaParagrafv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
