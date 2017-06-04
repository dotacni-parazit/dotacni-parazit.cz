<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Mestsky Obvod Mestska Castv01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikMestskyObvodMestskaCastv01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Mestsky Obvod Mestska Castv01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mestskyObvodMestskaCastKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mestskyObvodMestskaCastNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('obecNad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pad2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pad3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pad4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pad5') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pad6') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pad7') ?></th>
                <th scope="col"><?= $this->Paginator->sort('globalniNavrhZmenaIdentifikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nespravnostIndikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transakceIdentifikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikMestskyObvodMestskaCastv01 as $ciselnikMestskyObvodMestskaCastv01): ?>
            <tr>
                <td><?= h($ciselnikMestskyObvodMestskaCastv01->id) ?></td>
                <td><?= $this->Number->format($ciselnikMestskyObvodMestskaCastv01->mestskyObvodMestskaCastKod) ?></td>
                <td><?= h($ciselnikMestskyObvodMestskaCastv01->mestskyObvodMestskaCastNazev) ?></td>
                <td><?= h($ciselnikMestskyObvodMestskaCastv01->obecNad) ?></td>
                <td><?= h($ciselnikMestskyObvodMestskaCastv01->pad2) ?></td>
                <td><?= h($ciselnikMestskyObvodMestskaCastv01->pad3) ?></td>
                <td><?= h($ciselnikMestskyObvodMestskaCastv01->pad4) ?></td>
                <td><?= h($ciselnikMestskyObvodMestskaCastv01->pad5) ?></td>
                <td><?= h($ciselnikMestskyObvodMestskaCastv01->pad6) ?></td>
                <td><?= h($ciselnikMestskyObvodMestskaCastv01->pad7) ?></td>
                <td><?= $this->Number->format($ciselnikMestskyObvodMestskaCastv01->globalniNavrhZmenaIdentifikator) ?></td>
                <td><?= h($ciselnikMestskyObvodMestskaCastv01->nespravnostIndikator) ?></td>
                <td><?= $this->Number->format($ciselnikMestskyObvodMestskaCastv01->transakceIdentifikator) ?></td>
                <td><?= h($ciselnikMestskyObvodMestskaCastv01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikMestskyObvodMestskaCastv01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikMestskyObvodMestskaCastv01->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikMestskyObvodMestskaCastv01->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikMestskyObvodMestskaCastv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikMestskyObvodMestskaCastv01->id)]) ?>
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
