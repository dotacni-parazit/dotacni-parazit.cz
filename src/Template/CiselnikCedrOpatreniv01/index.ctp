<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Cedr Opatreniv01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikCedrOpatreniv01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Cedr Opatreniv01') ?></h3>
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
            <?php foreach ($ciselnikCedrOpatreniv01 as $ciselnikCedrOpatreniv01): ?>
            <tr>
                <td><?= h($ciselnikCedrOpatreniv01->idOpatreni) ?></td>
                <td><?= h($ciselnikCedrOpatreniv01->idPriorita) ?></td>
                <td><?= h($ciselnikCedrOpatreniv01->opatreniKod) ?></td>
                <td><?= h($ciselnikCedrOpatreniv01->opatreniNazev) ?></td>
                <td><?= $this->Number->format($ciselnikCedrOpatreniv01->opatreniCislo) ?></td>
                <td><?= h($ciselnikCedrOpatreniv01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikCedrOpatreniv01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikCedrOpatreniv01->idOpatreni]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikCedrOpatreniv01->idOpatreni]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikCedrOpatreniv01->idOpatreni], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikCedrOpatreniv01->idOpatreni)]) ?>
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
