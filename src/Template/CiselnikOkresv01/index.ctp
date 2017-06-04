<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Okresv01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikOkresv01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Okresv01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('okresKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('okresNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('okresNutsKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('krajNad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vuscNad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('globalniNavrhZmenaIdentifikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nespravnostIndikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transakceIdentifikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikOkresv01 as $ciselnikOkresv01): ?>
            <tr>
                <td><?= h($ciselnikOkresv01->id) ?></td>
                <td><?= $this->Number->format($ciselnikOkresv01->okresKod) ?></td>
                <td><?= h($ciselnikOkresv01->okresNazev) ?></td>
                <td><?= h($ciselnikOkresv01->okresNutsKod) ?></td>
                <td><?= h($ciselnikOkresv01->krajNad) ?></td>
                <td><?= h($ciselnikOkresv01->vuscNad) ?></td>
                <td><?= $this->Number->format($ciselnikOkresv01->globalniNavrhZmenaIdentifikator) ?></td>
                <td><?= h($ciselnikOkresv01->nespravnostIndikator) ?></td>
                <td><?= $this->Number->format($ciselnikOkresv01->transakceIdentifikator) ?></td>
                <td><?= h($ciselnikOkresv01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikOkresv01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikOkresv01->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikOkresv01->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikOkresv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikOkresv01->id)]) ?>
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
