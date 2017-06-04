<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Cedr Operacni Programv01'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciselnikCedrOperacniProgramv01 index large-9 medium-8 columns content">
    <h3><?= __('Ciselnik Cedr Operacni Programv01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idOperacniProgram') ?></th>
                <th scope="col"><?= $this->Paginator->sort('operacaniProgramKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('operacaniProgramNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('operacaniProgramCislo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikCedrOperacniProgramv01 as $ciselnikCedrOperacniProgramv01): ?>
            <tr>
                <td><?= h($ciselnikCedrOperacniProgramv01->idOperacniProgram) ?></td>
                <td><?= h($ciselnikCedrOperacniProgramv01->operacaniProgramKod) ?></td>
                <td><?= h($ciselnikCedrOperacniProgramv01->operacaniProgramNazev) ?></td>
                <td><?= $this->Number->format($ciselnikCedrOperacniProgramv01->operacaniProgramCislo) ?></td>
                <td><?= h($ciselnikCedrOperacniProgramv01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikCedrOperacniProgramv01->zaznamPlatnostDoDatum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciselnikCedrOperacniProgramv01->idOperacniProgram]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciselnikCedrOperacniProgramv01->idOperacniProgram]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciselnikCedrOperacniProgramv01->idOperacniProgram], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikCedrOperacniProgramv01->idOperacniProgram)]) ?>
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
