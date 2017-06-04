<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Financni Prostredek Cleneniv01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikFinancniProstredekCleneniv01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Financni Prostredek Cleneniv01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('financniProstredekCleneniKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('financniProstredekCleneniNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikFinancniProstredekCleneniv01 as $ciselnikFinancniProstredekCleneniv01): ?>
            <tr>
                <td><?= h($ciselnikFinancniProstredekCleneniv01->id) ?></td>
                <td><?= $this->Number->format($ciselnikFinancniProstredekCleneniv01->financniProstredekCleneniKod) ?></td>
                <td><?= h($ciselnikFinancniProstredekCleneniv01->financniProstredekCleneniNazev) ?></td>
                <td><?= h($ciselnikFinancniProstredekCleneniv01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikFinancniProstredekCleneniv01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikFinancniProstredekCleneniv01->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikFinancniProstredekCleneniv01->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikFinancniProstredekCleneniv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikFinancniProstredekCleneniv01->id)]) ?>
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
