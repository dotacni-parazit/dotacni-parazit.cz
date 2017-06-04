<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Programv01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikProgramv01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Programv01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('programKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('programNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikProgramv01 as $ciselnikProgramv01): ?>
            <tr>
                <td><?= h($ciselnikProgramv01->id) ?></td>
                <td><?= h($ciselnikProgramv01->programKod) ?></td>
                <td><?= h($ciselnikProgramv01->programNazev) ?></td>
                <td><?= h($ciselnikProgramv01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikProgramv01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikProgramv01->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikProgramv01->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikProgramv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikProgramv01->id)]) ?>
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
