<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Cedr Prioritav01'), ['action' => 'edit', $ciselnikCedrPrioritav01->idPriorita]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Cedr Prioritav01'), ['action' => 'delete', $ciselnikCedrPrioritav01->idPriorita], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikCedrPrioritav01->idPriorita)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Cedr Prioritav01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Cedr Prioritav01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikCedrPrioritav01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikCedrPrioritav01->idPriorita) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdPriorita') ?></th>
            <td><?= h($ciselnikCedrPrioritav01->idPriorita) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdOperacniProgram') ?></th>
            <td><?= h($ciselnikCedrPrioritav01->idOperacniProgram) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PrioritaKod') ?></th>
            <td><?= h($ciselnikCedrPrioritav01->prioritaKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PrioritaNazev') ?></th>
            <td><?= h($ciselnikCedrPrioritav01->prioritaNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PrioritaCislo') ?></th>
            <td><?= $this->Number->format($ciselnikCedrPrioritav01->prioritaCislo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikCedrPrioritav01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikCedrPrioritav01->zaznamPlatnostDoDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdPodprogram') ?></th>
            <td><?= $ciselnikCedrPrioritav01->idPodprogram ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
