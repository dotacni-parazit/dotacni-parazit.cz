<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Vuscv01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikVuscv01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Vuscv01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vuscKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('krajNutsKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vuscNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('globalniNavrhZmenaIdentifikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nespravnostIndikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transakceIdentifikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikVuscv01 as $ciselnikVuscv01): ?>
            <tr>
                <td><?= h($ciselnikVuscv01->id) ?></td>
                <td><?= $this->Number->format($ciselnikVuscv01->vuscKod) ?></td>
                <td><?= h($ciselnikVuscv01->krajNutsKod) ?></td>
                <td><?= h($ciselnikVuscv01->vuscNazev) ?></td>
                <td><?= $this->Number->format($ciselnikVuscv01->globalniNavrhZmenaIdentifikator) ?></td>
                <td><?= h($ciselnikVuscv01->nespravnostIndikator) ?></td>
                <td><?= $this->Number->format($ciselnikVuscv01->transakceIdentifikator) ?></td>
                <td><?= h($ciselnikVuscv01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikVuscv01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikVuscv01->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikVuscv01->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikVuscv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikVuscv01->id)]) ?>
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
