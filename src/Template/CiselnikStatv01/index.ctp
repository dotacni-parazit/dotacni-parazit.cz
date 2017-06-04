<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Statv01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikStatv01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Statv01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statKod3Znaky') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statKod3Cisla') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statKodOmezeny') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statNazevZkraceny') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statNazevEn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statNazevZkracenyEn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikStatv01 as $ciselnikStatv01): ?>
            <tr>
                <td><?= h($ciselnikStatv01->id) ?></td>
                <td><?= h($ciselnikStatv01->statKod3Znaky) ?></td>
                <td><?= $this->Number->format($ciselnikStatv01->statKod3Cisla) ?></td>
                <td><?= h($ciselnikStatv01->statKodOmezeny) ?></td>
                <td><?= h($ciselnikStatv01->statNazev) ?></td>
                <td><?= h($ciselnikStatv01->statNazevZkraceny) ?></td>
                <td><?= h($ciselnikStatv01->statNazevEn) ?></td>
                <td><?= h($ciselnikStatv01->statNazevZkracenyEn) ?></td>
                <td><?= h($ciselnikStatv01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikStatv01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikStatv01->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikStatv01->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikStatv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikStatv01->id)]) ?>
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
