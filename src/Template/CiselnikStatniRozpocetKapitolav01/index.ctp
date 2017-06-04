<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Statni Rozpocet Kapitolav01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikStatniRozpocetKapitolav01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Statni Rozpocet Kapitolav01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statniRozpocetKapitolaKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statniRozpocetKapitolaNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikStatniRozpocetKapitolav01 as $ciselnikStatniRozpocetKapitolav01): ?>
            <tr>
                <td><?= h($ciselnikStatniRozpocetKapitolav01->id) ?></td>
                <td><?= $this->Number->format($ciselnikStatniRozpocetKapitolav01->statniRozpocetKapitolaKod) ?></td>
                <td><?= h($ciselnikStatniRozpocetKapitolav01->statniRozpocetKapitolaNazev) ?></td>
                <td><?= h($ciselnikStatniRozpocetKapitolav01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikStatniRozpocetKapitolav01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikStatniRozpocetKapitolav01->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikStatniRozpocetKapitolav01->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikStatniRozpocetKapitolav01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikStatniRozpocetKapitolav01->id)]) ?>
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
