<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rozpoctove Obdobi'), ['action' => 'edit', $rozpoctoveObdobi->idObdobi]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rozpoctove Obdobi'), ['action' => 'delete', $rozpoctoveObdobi->idObdobi], ['confirm' => __('Are you sure you want to delete # {0}?', $rozpoctoveObdobi->idObdobi)]) ?> </li>
        <li><?= $this->Html->link(__('List Rozpoctove Obdobi'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rozpoctove Obdobi'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rozpoctoveObdobi view large-9 medium-8 columns content">
    <h3><?= h($rozpoctoveObdobi->idObdobi) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdObdobi') ?></th>
            <td><?= h($rozpoctoveObdobi->idObdobi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdRozhodnuti') ?></th>
            <td><?= h($rozpoctoveObdobi->idRozhodnuti) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IriDotacniTitul') ?></th>
            <td><?= h($rozpoctoveObdobi->iriDotacniTitul) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IriUcelovyZnak') ?></th>
            <td><?= h($rozpoctoveObdobi->iriUcelovyZnak) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CastkaCerpana') ?></th>
            <td><?= $this->Number->format($rozpoctoveObdobi->castkaCerpana) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CastkaUvolnena') ?></th>
            <td><?= $this->Number->format($rozpoctoveObdobi->castkaUvolnena) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CastkaVracena') ?></th>
            <td><?= $this->Number->format($rozpoctoveObdobi->castkaVracena) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CastkaSpotrebovana') ?></th>
            <td><?= $this->Number->format($rozpoctoveObdobi->castkaSpotrebovana) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RozpoctoveObdobi') ?></th>
            <td><?= $this->Number->format($rozpoctoveObdobi->rozpoctoveObdobi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DPlatnost') ?></th>
            <td><?= h($rozpoctoveObdobi->dPlatnost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DtAktualizace') ?></th>
            <td><?= h($rozpoctoveObdobi->dtAktualizace) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('VyporadaniKod') ?></th>
            <td><?= $rozpoctoveObdobi->vyporadaniKod ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
