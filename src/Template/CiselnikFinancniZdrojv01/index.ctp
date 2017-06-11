<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="ciselnikFinancniZdrojv01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Financni Zdrojv01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('financniZdrojKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('financniZdrojNadrizenyKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('financniZdrojNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikFinancniZdrojv01 as $ciselnikFinancniZdrojv01): ?>
            <tr>
                <td><?= h($ciselnikFinancniZdrojv01->id) ?></td>
                <td><?= h($ciselnikFinancniZdrojv01->financniZdrojKod) ?></td>
                <td><?= h($ciselnikFinancniZdrojv01->financniZdrojNadrizenyKod) ?></td>
                <td><?= h($ciselnikFinancniZdrojv01->financniZdrojNazev) ?></td>
                <td><?= h($ciselnikFinancniZdrojv01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikFinancniZdrojv01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikFinancniZdrojv01->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikFinancniZdrojv01->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikFinancniZdrojv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikFinancniZdrojv01->id)]) ?>
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
