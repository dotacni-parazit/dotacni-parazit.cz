<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Programv01'), ['action' => 'edit', $ciselnikProgramv01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Programv01'), ['action' => 'delete', $ciselnikProgramv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikProgramv01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Programv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Programv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikProgramv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikProgramv01->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($ciselnikProgramv01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProgramKod') ?></th>
            <td><?= h($ciselnikProgramv01->programKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProgramNazev') ?></th>
            <td><?= h($ciselnikProgramv01->programNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikProgramv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikProgramv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
