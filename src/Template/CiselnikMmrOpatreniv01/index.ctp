<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Mmr Opatreniv01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikMmrOpatreniv01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Mmr Opatreniv01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idOpatreni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idPriorita') ?></th>
                <th scope="col"><?= $this->Paginator->sort('opatreniKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('opatreniNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('opatreniCislo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikMmrOpatreniv01 as $ciselnikMmrOpatreniv01): ?>
            <tr>
                <td><?= h($ciselnikMmrOpatreniv01->idOpatreni) ?></td>
                <td><?= h($ciselnikMmrOpatreniv01->idPriorita) ?></td>
                <td><?= h($ciselnikMmrOpatreniv01->opatreniKod) ?></td>
                <td><?= h($ciselnikMmrOpatreniv01->opatreniNazev) ?></td>
                <td><?= h($ciselnikMmrOpatreniv01->opatreniCislo) ?></td>
                <td><?= h($ciselnikMmrOpatreniv01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikMmrOpatreniv01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikMmrOpatreniv01->idOpatreni]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikMmrOpatreniv01->idOpatreni]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikMmrOpatreniv01->idOpatreni], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikMmrOpatreniv01->idOpatreni)]) ?>
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
