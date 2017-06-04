<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Ucel Znakv01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikUcelZnakv01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Ucel Znakv01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idUcelZnak') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ucelZnakKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statniRozpocetKapitolaKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ucelZnakNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikUcelZnakv01 as $ciselnikUcelZnakv01): ?>
            <tr>
                <td><?= h($ciselnikUcelZnakv01->idUcelZnak) ?></td>
                <td><?= $this->Number->format($ciselnikUcelZnakv01->ucelZnakKod) ?></td>
                <td><?= $this->Number->format($ciselnikUcelZnakv01->statniRozpocetKapitolaKod) ?></td>
                <td><?= h($ciselnikUcelZnakv01->ucelZnakNazev) ?></td>
                <td><?= h($ciselnikUcelZnakv01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikUcelZnakv01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikUcelZnakv01->idUcelZnak]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikUcelZnakv01->idUcelZnak]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikUcelZnakv01->idUcelZnak], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikUcelZnakv01->idUcelZnak)]) ?>
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
