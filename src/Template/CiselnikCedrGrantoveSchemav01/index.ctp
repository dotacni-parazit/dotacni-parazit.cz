<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Cedr Grantove Schemav01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikCedrGrantoveSchemav01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Cedr Grantove Schemav01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idGrantoveSchema') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grantoveSchemaKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grantoveSchemaNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grantoveSchemaCislo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikCedrGrantoveSchemav01 as $ciselnikCedrGrantoveSchemav01): ?>
            <tr>
                <td><?= h($ciselnikCedrGrantoveSchemav01->idGrantoveSchema) ?></td>
                <td><?= h($ciselnikCedrGrantoveSchemav01->grantoveSchemaKod) ?></td>
                <td><?= h($ciselnikCedrGrantoveSchemav01->grantoveSchemaNazev) ?></td>
                <td><?= $this->Number->format($ciselnikCedrGrantoveSchemav01->grantoveSchemaCislo) ?></td>
                <td><?= h($ciselnikCedrGrantoveSchemav01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikCedrGrantoveSchemav01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikCedrGrantoveSchemav01->idGrantoveSchema]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikCedrGrantoveSchemav01->idGrantoveSchema]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikCedrGrantoveSchemav01->idGrantoveSchema], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikCedrGrantoveSchemav01->idGrantoveSchema)]) ?>
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
