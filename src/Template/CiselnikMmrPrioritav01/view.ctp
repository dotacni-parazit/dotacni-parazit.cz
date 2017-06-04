<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Mmr Prioritav01'), ['action' => 'edit', $ciselnikMmrPrioritav01->idPriorita]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Mmr Prioritav01'), ['action' => 'delete', $ciselnikMmrPrioritav01->idPriorita], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikMmrPrioritav01->idPriorita)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Mmr Prioritav01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Mmr Prioritav01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikMmrPrioritav01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikMmrPrioritav01->idPriorita) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdPriorita') ?></th>
            <td><?= h($ciselnikMmrPrioritav01->idPriorita) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdOperacniProgram') ?></th>
            <td><?= h($ciselnikMmrPrioritav01->idOperacniProgram) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdPodprogram') ?></th>
            <td><?= h($ciselnikMmrPrioritav01->idPodprogram) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PrioritaKod') ?></th>
            <td><?= h($ciselnikMmrPrioritav01->prioritaKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PrioritaNazev') ?></th>
            <td><?= h($ciselnikMmrPrioritav01->prioritaNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikMmrPrioritav01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikMmrPrioritav01->zaznamPlatnostDoDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PrioritaCislo') ?></th>
            <td><?= $ciselnikMmrPrioritav01->prioritaCislo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
