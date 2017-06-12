<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rozhodnuti Smlouva'), ['action' => 'edit', $rozhodnutiSmlouva->idSmlouva]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rozhodnuti Smlouva'), ['action' => 'delete', $rozhodnutiSmlouva->idSmlouva], ['confirm' => __('Are you sure you want to delete # {0}?', $rozhodnutiSmlouva->idSmlouva)]) ?> </li>
        <li><?= $this->Html->link(__('List Rozhodnuti Smlouva'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rozhodnuti Smlouva'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rozhodnutiSmlouva view large-9 medium-8 columns content">
    <h3><?= h($rozhodnutiSmlouva->idSmlouva) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdSmlouva') ?></th>
            <td><?= h($rozhodnutiSmlouva->idSmlouva) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdRozhodnuti') ?></th>
            <td><?= h($rozhodnutiSmlouva->idRozhodnuti) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CisloJednaciRozhodnuti') ?></th>
            <td><?= h($rozhodnutiSmlouva->cisloJednaciRozhodnuti) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RozhodnutiDatum') ?></th>
            <td><?= h($rozhodnutiSmlouva->rozhodnutiDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DtAktualizace') ?></th>
            <td><?= h($rozhodnutiSmlouva->dtAktualizace) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DokumentDruhKod') ?></th>
            <td><?= $rozhodnutiSmlouva->dokumentDruhKod ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
