<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rozhodnuti'), ['action' => 'edit', $rozhodnuti->idRozhodnuti]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rozhodnuti'), ['action' => 'delete', $rozhodnuti->idRozhodnuti], ['confirm' => __('Are you sure you want to delete # {0}?', $rozhodnuti->idRozhodnuti)]) ?> </li>
        <li><?= $this->Html->link(__('List Rozhodnuti'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rozhodnuti'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Dotace Poskytovatelv01'), ['controller' => 'CiselnikDotacePoskytovatelv01', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Dotace Poskytovatelv01'), ['controller' => 'CiselnikDotacePoskytovatelv01', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Financni Prostredek Cleneniv01'), ['controller' => 'CiselnikFinancniProstredekCleneniv01', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Financni Prostredek Cleneniv01'), ['controller' => 'CiselnikFinancniProstredekCleneniv01', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Financni Zdrojv01'), ['controller' => 'CiselnikFinancniZdrojv01', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Financni Zdrojv01'), ['controller' => 'CiselnikFinancniZdrojv01', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rozhodnuti view large-9 medium-8 columns content">
    <h3><?= h($rozhodnuti->idRozhodnuti) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdRozhodnuti') ?></th>
            <td><?= h($rozhodnuti->idRozhodnuti) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdDotace') ?></th>
            <td><?= h($rozhodnuti->idDotace) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PoskytovatelDotace') ?></th>
            <td><?= $rozhodnuti->has('PoskytovatelDotace') ? $this->Html->link($rozhodnuti->PoskytovatelDotace->dotacePoskytovatelNazev, ['controller' => 'CiselnikDotacePoskytovatelv01', 'action' => 'view', $rozhodnuti->PoskytovatelDotace->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CleneniFinancnichProstredku') ?></th>
            <td><?= $rozhodnuti->has('CleneniFinancnichProstredku') ? $this->Html->link($rozhodnuti->CleneniFinancnichProstredku->financniProstredekCleneniNazev, ['controller' => 'CiselnikFinancniProstredekCleneniv01', 'action' => 'view', $rozhodnuti->CleneniFinancnichProstredku->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FinancniZdroj') ?></th>
            <td><?= $rozhodnuti->has('FinancniZdroj') ? $this->Html->link($rozhodnuti->FinancniZdroj->financniZdrojNazev, ['controller' => 'CiselnikFinancniZdrojv01', 'action' => 'view', $rozhodnuti->FinancniZdroj->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CastkaPozadovana') ?></th>
            <td><?= $this->Number->format($rozhodnuti->castkaPozadovana) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CastkaRozhodnuta') ?></th>
            <td><?= $this->Number->format($rozhodnuti->castkaRozhodnuta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RokRozhodnuti') ?></th>
            <td><?= $this->Number->format($rozhodnuti->rokRozhodnuti) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DPlatnost') ?></th>
            <td><?= h($rozhodnuti->dPlatnost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DtAktualizace') ?></th>
            <td><?= h($rozhodnuti->dtAktualizace) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('InvesticeIndikator') ?></th>
            <td><?= $rozhodnuti->investiceIndikator ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NavratnostIndikator') ?></th>
            <td><?= $rozhodnuti->navratnostIndikator ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
