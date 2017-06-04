<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Dotace Poskytovatel V01'), ['action' => 'edit', $ciselnikDotacePoskytovatelV01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Dotace Poskytovatel V01'), ['action' => 'delete', $ciselnikDotacePoskytovatelV01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikDotacePoskytovatelV01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Dotace Poskytovatel V01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Dotace Poskytovatel V01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikDotacePoskytovatelV01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikDotacePoskytovatelV01->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('About') ?></th>
            <td><?= h($ciselnikDotacePoskytovatelV01->about) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotacePoskytovatelCiselnikAxisDotacePoskytovatelKod') ?></th>
            <td><?= h($ciselnikDotacePoskytovatelV01->dotacePoskytovatelCiselnikAxisDotacePoskytovatelKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotacePoskytovatelNazev') ?></th>
            <td><?= h($ciselnikDotacePoskytovatelV01->dotacePoskytovatelNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($ciselnikDotacePoskytovatelV01->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PrefLabel') ?></th>
            <td><?= h($ciselnikDotacePoskytovatelV01->prefLabel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ciselnikDotacePoskytovatelV01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotacePoskytovatelKod') ?></th>
            <td><?= $this->Number->format($ciselnikDotacePoskytovatelV01->dotacePoskytovatelKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikDotacePoskytovatelV01->zaznamPlatnostDoDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikDotacePoskytovatelV01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ciselnikDotacePoskytovatelV01->modified) ?></td>
        </tr>
    </table>
</div>
