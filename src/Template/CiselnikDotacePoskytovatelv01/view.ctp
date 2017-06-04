<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Dotace Poskytovatelv01'), ['action' => 'edit', $ciselnikDotacePoskytovatelv01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Dotace Poskytovatelv01'), ['action' => 'delete', $ciselnikDotacePoskytovatelv01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikDotacePoskytovatelv01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Dotace Poskytovatelv01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Dotace Poskytovatelv01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikDotacePoskytovatelv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikDotacePoskytovatelv01->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($ciselnikDotacePoskytovatelv01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotacePoskytovatelNazev') ?></th>
            <td><?= h($ciselnikDotacePoskytovatelv01->dotacePoskytovatelNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotacePoskytovatelKod') ?></th>
            <td><?= $this->Number->format($ciselnikDotacePoskytovatelv01->dotacePoskytovatelKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikDotacePoskytovatelv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikDotacePoskytovatelv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotacePoskytovatelNadrizenyKod') ?></th>
            <td><?= $ciselnikDotacePoskytovatelv01->dotacePoskytovatelNadrizenyKod ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
