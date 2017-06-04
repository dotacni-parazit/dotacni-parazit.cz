<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Mmr Prioritav01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikMmrPrioritav01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Mmr Prioritav01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idPriorita') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idOperacniProgram') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idPodprogram') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prioritaKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prioritaNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prioritaCislo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikMmrPrioritav01 as $ciselnikMmrPrioritav01): ?>
            <tr>
                <td><?= h($ciselnikMmrPrioritav01->idPriorita) ?></td>
                <td><?= h($ciselnikMmrPrioritav01->idOperacniProgram) ?></td>
                <td><?= h($ciselnikMmrPrioritav01->idPodprogram) ?></td>
                <td><?= h($ciselnikMmrPrioritav01->prioritaKod) ?></td>
                <td><?= h($ciselnikMmrPrioritav01->prioritaNazev) ?></td>
                <td><?= h($ciselnikMmrPrioritav01->prioritaCislo) ?></td>
                <td><?= h($ciselnikMmrPrioritav01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikMmrPrioritav01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikMmrPrioritav01->idPriorita]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikMmrPrioritav01->idPriorita]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikMmrPrioritav01->idPriorita], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikMmrPrioritav01->idPriorita)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
