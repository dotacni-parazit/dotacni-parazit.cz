<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Cedr Operacni Programv01'), ['action' => 'edit', $ciselnikCedrOperacniProgramv01->idOperacniProgram]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Cedr Operacni Programv01'), ['action' => 'delete', $ciselnikCedrOperacniProgramv01->idOperacniProgram], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikCedrOperacniProgramv01->idOperacniProgram)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Cedr Operacni Programv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Cedr Operacni Programv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikCedrOperacniProgramv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikCedrOperacniProgramv01->idOperacniProgram) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdOperacniProgram') ?></th>
            <td><?= h($ciselnikCedrOperacniProgramv01->idOperacniProgram) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OperacaniProgramKod') ?></th>
            <td><?= h($ciselnikCedrOperacniProgramv01->operacaniProgramKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OperacaniProgramNazev') ?></th>
            <td><?= h($ciselnikCedrOperacniProgramv01->operacaniProgramNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OperacaniProgramCislo') ?></th>
            <td><?= $this->Number->format($ciselnikCedrOperacniProgramv01->operacaniProgramCislo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikCedrOperacniProgramv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikCedrOperacniProgramv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
