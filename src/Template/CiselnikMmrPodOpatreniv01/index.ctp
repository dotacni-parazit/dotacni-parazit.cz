<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Mmr Pod Opatreniv01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikMmrPodOpatreniv01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Mmr Pod Opatreniv01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idPodOpatreni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idOpatreni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('podOpatreniKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('podOpatreniNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('podOpatreniCislo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikMmrPodOpatreniv01 as $ciselnikMmrPodOpatreniv01): ?>
            <tr>
                <td><?= h($ciselnikMmrPodOpatreniv01->idPodOpatreni) ?></td>
                <td><?= h($ciselnikMmrPodOpatreniv01->idOpatreni) ?></td>
                <td><?= h($ciselnikMmrPodOpatreniv01->podOpatreniKod) ?></td>
                <td><?= h($ciselnikMmrPodOpatreniv01->podOpatreniNazev) ?></td>
                <td><?= $this->Number->format($ciselnikMmrPodOpatreniv01->podOpatreniCislo) ?></td>
                <td><?= h($ciselnikMmrPodOpatreniv01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikMmrPodOpatreniv01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikMmrPodOpatreniv01->idPodOpatreni]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikMmrPodOpatreniv01->idPodOpatreni]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikMmrPodOpatreniv01->idPodOpatreni], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikMmrPodOpatreniv01->idPodOpatreni)]) ?>
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
