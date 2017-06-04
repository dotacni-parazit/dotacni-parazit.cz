<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Rozpoctova Skladba Polozkav01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikRozpoctovaSkladbaPolozkav01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Rozpoctova Skladba Polozkav01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rozpoctovaSkladbaPolozkaKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rozpoctovaSkladbaPolozkaNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikRozpoctovaSkladbaPolozkav01 as $ciselnikRozpoctovaSkladbaPolozkav01): ?>
            <tr>
                <td><?= h($ciselnikRozpoctovaSkladbaPolozkav01->id) ?></td>
                <td><?= $this->Number->format($ciselnikRozpoctovaSkladbaPolozkav01->rozpoctovaSkladbaPolozkaKod) ?></td>
                <td><?= h($ciselnikRozpoctovaSkladbaPolozkav01->rozpoctovaSkladbaPolozkaNazev) ?></td>
                <td><?= h($ciselnikRozpoctovaSkladbaPolozkav01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikRozpoctovaSkladbaPolozkav01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikRozpoctovaSkladbaPolozkav01->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikRozpoctovaSkladbaPolozkav01->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikRozpoctovaSkladbaPolozkav01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikRozpoctovaSkladbaPolozkav01->id)]) ?>
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
