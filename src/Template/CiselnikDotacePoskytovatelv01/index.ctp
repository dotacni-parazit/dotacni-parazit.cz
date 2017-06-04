<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Dotace Poskytovatelv01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikDotacePoskytovatelv01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Dotace Poskytovatelv01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dotacePoskytovatelKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dotacePoskytovatelNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dotacePoskytovatelNadrizenyKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikDotacePoskytovatelv01 as $ciselnikDotacePoskytovatelv01): ?>
            <tr>
                <td><?= h($ciselnikDotacePoskytovatelv01->id) ?></td>
                <td><?= $this->Number->format($ciselnikDotacePoskytovatelv01->dotacePoskytovatelKod) ?></td>
                <td><?= h($ciselnikDotacePoskytovatelv01->dotacePoskytovatelNazev) ?></td>
                <td><?= h($ciselnikDotacePoskytovatelv01->dotacePoskytovatelNadrizenyKod) ?></td>
                <td><?= h($ciselnikDotacePoskytovatelv01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikDotacePoskytovatelv01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikDotacePoskytovatelv01->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikDotacePoskytovatelv01->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikDotacePoskytovatelv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikDotacePoskytovatelv01->id)]) ?>
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
