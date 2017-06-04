<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Cedr Prioritav01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikCedrPrioritav01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Cedr Prioritav01') ?></h3>
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
            <?php foreach ($ciselnikCedrPrioritav01 as $ciselnikCedrPrioritav01): ?>
            <tr>
                <td><?= h($ciselnikCedrPrioritav01->idPriorita) ?></td>
                <td><?= h($ciselnikCedrPrioritav01->idOperacniProgram) ?></td>
                <td><?= h($ciselnikCedrPrioritav01->idPodprogram) ?></td>
                <td><?= h($ciselnikCedrPrioritav01->prioritaKod) ?></td>
                <td><?= h($ciselnikCedrPrioritav01->prioritaNazev) ?></td>
                <td><?= $this->Number->format($ciselnikCedrPrioritav01->prioritaCislo) ?></td>
                <td><?= h($ciselnikCedrPrioritav01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikCedrPrioritav01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikCedrPrioritav01->idPriorita]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikCedrPrioritav01->idPriorita]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikCedrPrioritav01->idPriorita], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikCedrPrioritav01->idPriorita)]) ?>
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
