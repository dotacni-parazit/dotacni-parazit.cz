<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rozhodnuti Smlouva'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rozhodnutiSmlouva index large-9 medium-8 columns content">
    <h3><?= __('Rozhodnuti Smlouva') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idSmlouva') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idRozhodnuti') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cisloJednaciRozhodnuti') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dokumentDruhKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rozhodnutiDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dtAktualizace') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rozhodnutiSmlouva as $rozhodnutiSmlouva): ?>
            <tr>
                <td><?= h($rozhodnutiSmlouva->idSmlouva) ?></td>
                <td><?= h($rozhodnutiSmlouva->idRozhodnuti) ?></td>
                <td><?= h($rozhodnutiSmlouva->cisloJednaciRozhodnuti) ?></td>
                <td><?= h($rozhodnutiSmlouva->dokumentDruhKod) ?></td>
                <td><?= h($rozhodnutiSmlouva->rozhodnutiDatum) ?></td>
                <td><?= h($rozhodnutiSmlouva->dtAktualizace) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rozhodnutiSmlouva->idSmlouva]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rozhodnutiSmlouva->idSmlouva]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rozhodnutiSmlouva->idSmlouva], ['confirm' => __('Are you sure you want to delete # {0}?', $rozhodnutiSmlouva->idSmlouva)]) ?>
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
