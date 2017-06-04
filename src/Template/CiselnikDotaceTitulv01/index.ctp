<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Dotace Titulv01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikDotaceTitulv01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Dotace Titulv01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idDotaceTitul') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dotaceTitulKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dotaceTitulVlastniKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statniRozpocetKapitolaKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dotaceTitulNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dotaceTitulNazevZkraceny') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikDotaceTitulv01 as $ciselnikDotaceTitulv01): ?>
            <tr>
                <td><?= h($ciselnikDotaceTitulv01->idDotaceTitul) ?></td>
                <td><?= $this->Number->format($ciselnikDotaceTitulv01->dotaceTitulKod) ?></td>
                <td><?= h($ciselnikDotaceTitulv01->dotaceTitulVlastniKod) ?></td>
                <td><?= $this->Number->format($ciselnikDotaceTitulv01->statniRozpocetKapitolaKod) ?></td>
                <td><?= h($ciselnikDotaceTitulv01->dotaceTitulNazev) ?></td>
                <td><?= h($ciselnikDotaceTitulv01->dotaceTitulNazevZkraceny) ?></td>
                <td><?= h($ciselnikDotaceTitulv01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikDotaceTitulv01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikDotaceTitulv01->idDotaceTitul]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikDotaceTitulv01->idDotaceTitul]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikDotaceTitulv01->idDotaceTitul], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikDotaceTitulv01->idDotaceTitul)]) ?>
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
