<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Mmr Operacni Programv01'), ['action' => 'edit', $ciselnikMmrOperacniProgramv01->idOperacniProgram]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Mmr Operacni Programv01'), ['action' => 'delete', $ciselnikMmrOperacniProgramv01->idOperacniProgram], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikMmrOperacniProgramv01->idOperacniProgram)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Mmr Operacni Programv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Mmr Operacni Programv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikMmrOperacniProgramv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikMmrOperacniProgramv01->idOperacniProgram) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdOperacniProgram') ?></th>
            <td><?= h($ciselnikMmrOperacniProgramv01->idOperacniProgram) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OperacaniProgramKod') ?></th>
            <td><?= h($ciselnikMmrOperacniProgramv01->operacaniProgramKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OperacaniProgramNazev') ?></th>
            <td><?= h($ciselnikMmrOperacniProgramv01->operacaniProgramNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OperacaniProgramCislo') ?></th>
            <td><?= h($ciselnikMmrOperacniProgramv01->operacaniProgramCislo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikMmrOperacniProgramv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikMmrOperacniProgramv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
