<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rozhodnuti'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Dotace Poskytovatelv01'), ['controller' => 'CiselnikDotacePoskytovatelv01', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Dotace Poskytovatelv01'), ['controller' => 'CiselnikDotacePoskytovatelv01', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Financni Prostredek Cleneniv01'), ['controller' => 'CiselnikFinancniProstredekCleneniv01', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Financni Prostredek Cleneniv01'), ['controller' => 'CiselnikFinancniProstredekCleneniv01', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Financni Zdrojv01'), ['controller' => 'CiselnikFinancniZdrojv01', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Financni Zdrojv01'), ['controller' => 'CiselnikFinancniZdrojv01', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rozhodnuti index large-9 medium-8 columns content">
    <h3><?= __('Rozhodnuti') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idRozhodnuti') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idDotace') ?></th>
                <th scope="col"><?= $this->Paginator->sort('castkaPozadovana') ?></th>
                <th scope="col"><?= $this->Paginator->sort('castkaRozhodnuta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iriPoskytovatelDotace') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iriCleneniFinancnichProstredku') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iriFinancniZdroj') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rokRozhodnuti') ?></th>
                <th scope="col"><?= $this->Paginator->sort('investiceIndikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('navratnostIndikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dPlatnost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dtAktualizace') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rozhodnuti as $rozhodnuti): ?>
            <tr>
                <td><?= h($rozhodnuti->idRozhodnuti) ?></td>
                <td><?= h($rozhodnuti->idDotace) ?></td>
                <td><?= $this->Number->format($rozhodnuti->castkaPozadovana) ?></td>
                <td><?= $this->Number->format($rozhodnuti->castkaRozhodnuta) ?></td>
                <td><?= $rozhodnuti->has('PoskytovatelDotace') ? $this->Html->link($rozhodnuti->PoskytovatelDotace->dotacePoskytovatelNazev, ['controller' => 'CiselnikDotacePoskytovatelv01', 'action' => 'view', $rozhodnuti->PoskytovatelDotace->id]) : '' ?></td>
                <td><?= $rozhodnuti->has('CleneniFinancnichProstredku') ? $this->Html->link($rozhodnuti->CleneniFinancnichProstredku->financniProstredekCleneniNazev, ['controller' => 'CiselnikFinancniProstredekCleneniv01', 'action' => 'view', $rozhodnuti->CleneniFinancnichProstredku->id]) : '' ?></td>
                <td><?= $rozhodnuti->has('FinancniZdroj') ? $this->Html->link($rozhodnuti->FinancniZdroj->financniZdrojNazev, ['controller' => 'CiselnikFinancniZdrojv01', 'action' => 'view', $rozhodnuti->FinancniZdroj->id]) : '' ?></td>
                <td><?= $this->Number->format($rozhodnuti->rokRozhodnuti) ?></td>
                <td><?= h($rozhodnuti->investiceIndikator) ?></td>
                <td><?= h($rozhodnuti->navratnostIndikator) ?></td>
                <td><?= h($rozhodnuti->dPlatnost) ?></td>
                <td><?= h($rozhodnuti->dtAktualizace) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rozhodnuti->idRozhodnuti]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rozhodnuti->idRozhodnuti]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rozhodnuti->idRozhodnuti], ['confirm' => __('Are you sure you want to delete # {0}?', $rozhodnuti->idRozhodnuti)]) ?>
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
